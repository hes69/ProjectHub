<?php

namespace App\Http\Controllers;
use App\Projectstatus;
use App\Project;
use App\Assignedproject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProjectstatusController extends Controller
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
        $user = Auth::user();
        //$pjs = Projectstatus::simplePaginate(10);
        $pjs = Projectstatus::orderBy('id', 'desc')->simplePaginate(10);
        //$results = Project::orderBy('name')->get();
        return view('pjstatus.index', ['pjs' => $pjs]);
        return view('home');
    }

    public function activate($id)
    {
        $pjs = Projectstatus::findOrFail($id);
        $pjs->status='Active';
        $pjs->save();
        return back();
    }

    public function acceptproject($id)
    {
        $pjs = Projectstatus::findOrFail($id);
        $pjs->status='Active';
        $pjs->save();
        return back();
    }


    public function deactivate($id)
    {

        $pjs = Projectstatus::findOrFail($id);
        $pjs->status='Inactive';
        $pjs->save();
        return back();

    }


    public function inactiveProject()
    {
        $pjs = Projectstatus::where('status', 'Inactive')
            ->get();
        return view('pjstatus.inactive', array('pjs' => $pjs));
    }

    public function activeProject()
    {
        $user_id=Auth::id();
        //$pjs = Projectstatus::where('status', 'Active')
             $pjs =  Projectstatus::where('status', 'Active')
                -> orWhere('status','Assigend')
                ->orderBy('id', 'desc')->get();
                /// ->simplePaginate(12);
        return view('pjstatus.active', array('user_id'=>$user_id,'pjs' => $pjs));
    }


    public function assignproject($id)
    {
        $pjs = Projectstatus::where('project_id', $id)
            ->first();
        $userpjs =User::findOrFail($pjs->user_id);
        $asp = new Assignedproject();
        $asp->status = 'Assigned';
        $asp->user_id = Auth::id();
        $asp->project_id = $pjs->project_id;
        $asp->projectstatus_id =$pjs->id;
        $asp->save();
        $pjs->status='Assigend';
        $pjs->save();
        $user =User::findOrFail(Auth::id());
        return view('pjstatus.contact', array('user' => $userpjs));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pjs = Projectstatus::findOrFail($id);
        $pjs->status='Active';
        $pjs->save();
        return back();
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
