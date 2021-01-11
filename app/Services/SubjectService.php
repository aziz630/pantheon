<?php

namespace App\Services;

use App\Models\Subject;

class SubjectService
{


    /**
     * 
     * 
     * Read all subjects
     */

    public function get_all_subjects()
    {
        $subjects = false;

        if ($data = Subject::all()) {
            $subjects = $data;
        }

        return $subjects;
    }


    /**
     * 
     * 
     * Read all trashed subjects
     */

    public function get_all_trashed_subjects()
    {
        $subjects = false;

        if ($data = Subject::onlyTrashed()->get()) {
            $subjects = $data;
        }

        return $subjects;
    }



    /**
     * 
     * Read a specific class info from the database.
     */

    public function get_a_subject($id)
    {
        $subject = false;

        if ($data = Subject::where('id', $id)->get()) {
            $subject = $data;
        }
        return $subject;
    }



    /**
     * Save new subject
     */

    function save_subject($rq)
    {
        $model = new Subject();
        $model->subject_name = $rq->subjectName;
        $model->subject_description = $rq->subjectDescription;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * 
     * Update a subject
     */

    public function update_subject($rq)
    {
        $model = Subject::find($rq->sId);
        $model->subject_name = $rq->subjectName;
        $model->subject_description = $rq->subjectDescription;

        if ($model->save()) {
            return true;
        }
        return false;
    }



    /**
     * Delete a subject
     */

    function delete_subject($id)
    {
        $model = Subject::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a subject
     */

    function restore_subject($id)
    {
        $model = Subject::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
