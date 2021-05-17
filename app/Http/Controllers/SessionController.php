<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Http\Request;
use App\Services\SessionService;
use Yajra\DataTables\Facades\DataTables;

class SessionController extends Controller
{
    protected $session_service = null;

    public function __construct()
    {
        $this->session_service = new SessionService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function session_list($p = null)
    {
        $page_title = 'Sessions Listing';
        $page_description = $p == null ? 'List of all active sessions' : 'List of all deleted sessions';
        $trashed = $p != null ? true : false;

        return view('pages.sessions.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all sessions from the database through "service class"
     */

    public function read_all_sessions(Request $RQ)
    {
        $sessions = $this->session_service->get_all_sessions();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($sessions)->addIndexColumn()
                ->addColumn('sessionName', function ($row) {
                    $sessionName = $row->session . ' - ' . ($row->session + 1);
                    return $sessionName;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('session_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('session_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all sessions from the database through "service class"
     */

    public function read_all_trashed_sessions(Request $RQ)
    {
        $sessions = $this->session_service->get_all_trashed_sessions();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($sessions)->addIndexColumn()
                ->addColumn('sessionName', function ($row) {
                    $sessionName = $row->session . ' - ' . ($row->session + 1);
                    return $sessionName;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('session_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restore"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Return a form view to create new session
     */

    public function create_session(Request $rq)
    {
        $page_title = 'Create Session';
        $page_description = 'Use this form to create session';

        return view('pages.sessions.create', compact('page_title', 'page_description'));
    }



    /**
     * 
     * 
     * Save new sessions
     */

    public function save_session(StoreSessionRequest $RQ)
    {
        
        $res = $this->session_service->save_session($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Session created successfully.');
        } else {
            return redirect()->back()->with('error', 'Session can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * Read a specifc session info and return 
     * a form view to edit a section 
     */

    public function edit_session(StoreSessionRequest $rq, $id)
    {
        $page_title = 'Edit Session';
        $page_description = 'Use this form to edit/update session';

        $session = $this->session_service->get_a_session($id)[0];
        return view('pages.sessions.edit', compact('page_title', 'page_description', 'session'));
    }



    /**
     * 
     * 
     * Update session
     */

    public function update_session(Request $RQ)
    {
        $res = $this->session_service->update_session($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Session updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Session can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete session
     */

    public function delete_session(Request $rq, $id)
    {
        $res = $this->session_service->delete_session($id);
        if ($res) {
            return redirect()->back()->with('success', 'Session deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Session can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore Session
     */

    public function restore_session(Request $RQ, $id)
    {
        $res = $this->session_service->restore_session($id);
        if ($res) {
            return redirect()->back()->with('success', 'Session restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Session can not be restored at this time.');
        }
    }
}
