<?php

namespace App\Services;

use App\Models\Session;

class SessionService
{


    /**
     * 
     * 
     * Read all sessions
     */
    public function get_all_sessions()
    {
        $sessions = false;

        if ($data = Session::all()) {
            $sessions = $data;
        }

        return $sessions;
    }


    /**
     * 
     * 
     * Read all trashed sessions
     */
    public function get_all_trashed_sessions()
    {
        $sessions = false;

        if ($data = Session::onlyTrashed()->get()) {
            $sessions = $data;
        }

        return $sessions;
    }



    /**
     * 
     * Read a specific class info from the database.
     */

    public function get_a_session($id)
    {
        $session = false;

        if ($data = Session::where('id', $id)->get()) {
            $session = $data;
        }
        return $session;
    }



    /**
     * Save new session
     */

    function save_session($rq)
    {
        $model = new Session();
        $model->session = $rq->session;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * 
     * Update a session
     */

    public function update_session($rq)
    {
        $model = Session::find($rq->sId);
        $model->session = $rq->session;

        if ($model->save()) {
            return true;
        }
        return false;
    }



    /**
     * Delete a session
     */

    function delete_session($id)
    {
        $model = Session::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a session
     */

    function restore_session($id)
    {
        $model = Session::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
