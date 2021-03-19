<?php

namespace App\Services;

use App\Models\PreviousSchool;
use App\Models\PreviousSchoolRemark;

class PrevSchoolService
{


    /**
     * 
     * Read all previous school information
     * */

    public function get_a_previous_school_for_student($std_id)
    {
        $previousSchools = false;

        if ($data = PreviousSchoolRemark::with('previous_school')->where('student_id', $std_id)->get()) {
            $previousSchools = count($data) > 0 ? $data[0] : false;
        }

        //dd($previousSchools);

        return $previousSchools;
    }


    /**
     * 
     * 
     * Find a specific school without remarks information
     */
    public function get_or_save_previous_school($rq)
    {
        $model = PreviousSchool::where(['prevSch_name' => $rq->school_name, 'prevSch_address' => $rq->school_address])->get();
        if (count($model))
            return $model[0]->id;
        else {

            $school = PreviousSchool::create([
                'prevSch_name' => $rq->school_name,
                'prevSch_phone_no' => $rq->school_contact,
                'prevSch_address' => $rq->school_address,
            ]);
            return $school->id;
        }
    }



    /**
     * Save new previous school information
     */

    function save_previous_school_info($rq)
    {
        $resp = $this->get_or_save_previous_school($rq);

        $resp = $this->update_school_remarks($rq, $resp);
        return true;
    }

    /**
     * 
     * 
     * update previous school remarks for a specific student
     */
    public function update_school_remarks($rq, $school_id)
    {
        $slc = '';
        $cc = '';
        $sc = '';
        $ler = '';

        /**
         * 
         * check for uploaded documents
         */
        if ($rq->std_slc != null) {

            $slc = time() . '.' . request()->std_slc->getClientOriginalExtension();

            request()->std_slc->move(public_path('media/uploads/school_documents'), $slc);
        }

        if ($rq->std_cc != null) {

            $cc = time() . '.' . request()->std_cc->getClientOriginalExtension();

            request()->std_cc->move(public_path('media/uploads/school_documents'), $cc);
        }

        if ($rq->std_sc != null) {

            $sc = time() . '.' . request()->std_sc->getClientOriginalExtension();

            request()->std_sc->move(public_path('media/uploads/school_documents'), $sc);
        }

        if ($rq->std_ler != null) {

            $ler = time() . '.' . request()->std_ler->getClientOriginalExtension();

            request()->std_ler->move(public_path('media/uploads/school_documents'), $ler);
        }

        $model = PreviousSchoolRemark::where([
            'prev_school_id' => $rq->prev_school_id,
            'student_id' => $rq->std_id
        ])->get();


        if (count($model)) {
            $model[0]->prevSchRem_remarks = $rq->std_remarks;
            $slc != '' ? $model[0]->prevSchRem_slc = $slc : '';
            $cc != '' ? $model[0]->prevSchRem_c_c = $cc : '';
            $sc != '' ? $model[0]->prevSchRem_s_c = $sc : '';
            $ler != '' ? $model[0]->prevSchRem_last_exam_report = $ler : '';
            $model[0]->prev_school_id = $school_id;
            $model[0]->student_id = $rq->std_id;
            $model[0]->save();
            return true;
        } else {
            $model = new PreviousSchoolRemark();
            $model->prevSchRem_remarks = $rq->std_remarks;
            $model->prevSchRem_slc = $slc != '' ? $slc : '';
            $model->prevSchRem_c_c = $cc != '' ? $cc : '';
            $model->prevSchRem_s_c = $sc != '' ? $sc : '';
            $model->prevSchRem_last_exam_report = $ler != '' ? $ler : '';
            $model->prev_school_id = $school_id;
            $model->student_id = $rq->std_id;
            $model->save();
            return true;
        }

        return false;
    }



    /**
     * Update a previous school information
     */

    function update_a_previous_school($rq)
    {

        $resp = $this->get_or_save_previous_school($rq);

        $resp = $this->update_school_remarks($rq, $resp);

        return true;
        // $model = Section::find($rq->sId);
        // $model->section_name = $rq->sectionName;

        // if ($model->save()) {
        //     return true;
        // }

        return false;
    }
}
