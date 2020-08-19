<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\AssignThisVariablePass;
use App\Assignedproject;
use App\Role;
use App\User;
use App\Projectstatus;


class AssignProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

    }



    public function index()
    {
        $asps = Assignedproject::where('status', 'Assigned')
            ->get();
       return view('assignedprojects.index', array('asps' => $asps));
    }

    public function deassign($id)
    {
        $asp = Assignedproject::findOrFail($id);
        $asp->status='Deassign';
        $ps_id=$asp->projectstatus_id;
        $ps = Projectstatus::findOrFail($ps_id);
        $ps->status = 'Active';
        $ps->save();
        $asp->save();
        $pj = Assignedproject::findOrFail($id);
        echo $pj->status;
        $pj->status=1 ;
        $affected = DB::update('update assignedprojects set status = ?  where id = ?', ['Deassign',$id]);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edituser()
    {
        $userRole = Role::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        return View('assignedprojects.edituser',['userRole'=>$userRole,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
