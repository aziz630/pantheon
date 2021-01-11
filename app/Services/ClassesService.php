<?php

namespace App\Services;

use App\Models\Classes;

class ClassesService
{

    /**
     * 
     * Read all classes from the database which are not deleted
     */

    public function get_all_classes()
    {
        $classes = false;

        if ($data = Classes::all()) {
            $classes = $data;
        }

        return $classes;
    }

    /**
     * 
     * Read all classes from the database which are deleted
     */

    public function get_all_trashed_classes()
    {
        $classes = false;

        if ($data = Classes::onlyTrashed()->get()) {
            $classes = $data;
        }

        return $classes;
    }

    /**
     * 
     * 
     * Read all classes for a specific session
     */
    public function get_all_sections_for_a_specific_class($id)
    {
        $class = Classes::find($id);
        $sections = $class->sections;
        return $sections;
    }



    /**
     * 
     * Read a specific class info from the database.
     */

    public function get_a_class($id)
    {
        $class = false;

        if ($data = Classes::where('id', $id)->get()) {
            $class = $data;
        }
        return $class;
    }



    /**
     * Save new class
     */

    function save_class($rq)
    {
        $model = new Classes();
        $model->class_name = $rq->className;
        $model->class_limit = $rq->classLimit;

        if ($model->save()) {
            $model->sections()->sync($rq->sections);
            return true;
        }

        return false;
    }



    /**
     * Update a class
     */

    function update_class($rq)
    {
        $model = Classes::find($rq->cId);
        $model->class_name = $rq->className;
        $model->class_limit = $rq->classLimit;

        if ($model->save()) {
            $model->sections()->sync($rq->sections);
            return true;
        }

        return false;
    }



    /**
     * Delete a class
     */

    function delete_class($id)
    {
        $model = Classes::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a class
     */

    function restore_class($id)
    {
        $model = Classes::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
