<?php

namespace App\Services;

use App\Models\FeeCategory;

class FeeCategoryService
{


    /**
     * 
     * 
     * Read all fee category
     */

    public function get_all_fee_categories()
    {
        $categories = false;

        if ($data = FeeCategory::all()) {
            $categories = $data;
        }

        return $categories;
    }


    /**
     * 
     * 
     * Read all trashed fee categories
     */

    public function get_all_trashed_fee_categories()
    {
        $categories = false;

        if ($data = FeeCategory::onlyTrashed()->get()) {
            $categories = $data;
        }

        return $categories;
    }



    /**
     * 
     * Read a specific fee category info from the database.
     */

    public function get_a_fee_category($id)
    {
        $category = false;

        if ($data = FeeCategory::where('id', $id)->get()) {
            $category = $data;
        }
        return $category;
    }



    /**
     * Save new feee category
     */

    function save_fee_category($rq)
    {
        $model = new FeeCategory();
        $model->category_name = $rq->categoryName;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * 
     * Update a fee category
     */

    public function update_fee_category($rq)
    {
        $model = FeeCategory::find($rq->cId);
        $model->category_name = $rq->categoryName;

        if ($model->save()) {
            return true;
        }
        return false;
    }



    /**
     * Delete a fee category
     */

    function delete_fee_category($id)
    {
        $model = FeeCategory::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a fee category
     */

    function restore_fee_category($id)
    {
        $model = FeeCategory::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
