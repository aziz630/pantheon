<?php

namespace App\Services;

use App\Models\Section;

class SectionService
{


    /**
     * 
     * Read all sections
     * */

    public function get_all_sections()
    {
        $sections = false;

        if ($data = Section::all()) {
            $sections = $data;
        }

        return $sections;
    }


    /**
     * 
     * Read all trashed sections
     */

    public function get_all_trashed_sections()
    {
        $sections = false;

        if ($data = Section::onlyTrashed()->get()) {
            $sections = $data;
        }

        return $sections;
    }



    /**
     * 
     * Read a specific class info from the database.
     */

    public function get_a_section($id)
    {
        $section = false;

        if ($data = Section::where('id', $id)->get()) {
            $section = $data;
        }
        return $section;
    }



    /**
     * Save new section
     */

    function save_section($rq)
    {
        $model = new Section();
        $model->section_name = $rq->sectionName;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * Update a section
     */

    function update_section($rq)
    {
        $model = Section::find($rq->sId);
        $model->section_name = $rq->sectionName;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * Delete a section
     */

    function delete_section($id)
    {
        $model = Section::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a Section
     */

    function restore_section($id)
    {
        $model = Section::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
