<?php

namespace App\Http\Controllers;
use App\Projectstatus;
use App\Project;
use App\Assignedproject;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;


class UserController extends Controller
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
        if($user) {
            if ($user->authorizeRoles('admin')) {
                $users = User::all();
                return view('users.index', array('users' => $users));
        }
            return redirect('activeproject');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        if($user) {
            if ($user->authorizeRoles('admin')) {

                $role_id=$request->role;
                $user_id=$request->user;
                DB::update('update role_user set role_id = ? where user_id = ?', [$role_id,$user_id]);
                return redirect('activeproject');

            }
            return redirect('activeproject');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        Return view('users.show')->withUser($user);
        //
    }


    public function test()
    {
        Return view('users.test');
    }


    public function profile($id)
    {

            $user = Auth::user();
        if($user) {
        if (($user->id==$id)||($user->authorizeRoles('admin'))) {
            $user = User::findOrFail($id);
            $asprojects = Assignedproject::where('user_id', $id)->get();
            $psprojects = Projectstatus::where('user_id', $id)->get();

            //return View('users.showproject',['asproject'=>$asproject]);
            Return view('users.profile',['asprojects'=>$asprojects,'psprojects'=>$psprojects])->withUser($user);
             }
             return redirect('activeproject');
            }


        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editrole()

    {


        $user = Auth::user();
        if($user) {
            if ($user->authorizeRoles('admin')) {

                $userRole = Role::pluck('name', 'id');
                $users = User::pluck('name', 'id');
                return View('users.editrole',['userRole'=>$userRole,'users'=>$users]);

            }
            return redirect('activeproject');
        }





    }

    public function showproject($id)

    {
        $user = Auth::user();
        if($user) {
            if (($user->id==$id)||($user->authorizeRoles('admin'))) {
                $asproject = Assignedproject::where('user_id', $id)->get();
                return View('users.showproject',['asproject'=>$asproject]);
            }
            return redirect('activeproject');
        }






        ///print_r($project);
        // $userRole = Role::pluck('name', 'id');
        /// $users = User::pluck('name', 'id');
        ///return View('users.editrole',['userRole'=>$userRole,'users'=>$users]);

    }


    public function changepassword ($id)
    {

        $user = Auth::user();
        if($user) {
            if (($user->id==$id)||($user->authorizeRoles('admin'))) {
                $user = User::findOrFail($id);
                return View('users.changepassword',['user'=>$user]);
            }
            return redirect('activeproject');
        }




    }

    public function updatepassword (Request $request,$id)
    {
        $this->validate($request, [
            'password' => 'required',

        ]);

        $user = Auth::user();
        if($user) {
            if (($user->id==$id)||($user->authorizeRoles('admin'))) {


                $user = User::findOrFail($id);
                $user->password=bcrypt($request->password);
                $user->save();
                return redirect('activeproject');
            }
            return redirect('activeproject');
        }





    }


    public function edit($id)
    {
        $user = Auth::user();
        if($user) {
            if (($user->id==$id)||($user->authorizeRoles('admin'))) {
                $user = User::findOrFail($id);
                return view('users.edit')->withUser($user);
            }
            return redirect('activeproject');
        }

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
        $user = Auth::user();
        if($user) {
            if (($user->id==$id)||($user->authorizeRoles('admin'))) {
                $user = User::findOrFail($id);
                $input = $request->all();
                $user->fill($input)->save();
                return redirect('activeproject');
            }
            return redirect('activeproject');
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
