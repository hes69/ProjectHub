<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use App\Projectstatus;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use App\User;
use App\Http\Controllers\Sentry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckUser;
use PHPMailer\PHPMailer\PHPMailer;

class ProjectController extends Controller
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
        if ($user) {
            if ($user->authorizeRoles('admin')) {
                $projects = Project::all();
                return view('projects.index', array('projects' => $projects));
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
        $this->middleware('auth');
        ///$userList = App\User::pluck('name', 'id');
        $projectTypes = Category::pluck('type', 'id');
        return View('projects.create', compact('id', 'projectTypes'));
    }



    public function sendmail(Request $request, $id)
    {
        $pjs = Projectstatus::where('project_id', $id)
            ->first();
        $userpjs =User::findOrFail($pjs->user_id);
        $userpjs->email;
        $mail = new PHPMailer();
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Set the hostname of the mail server
        $mail->Host = 'test';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;
        //Set the encryption system to use - ssl (deprecated) or tls
        ///$mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "faraji";
        //Password to use for SMTP authentication
        $mail->Password = "test";
        //Set who the message is to be sent from
        $mail->setFrom('hes.faraji@yahoo.com', 'hesam faraji');
        //Set who the message is to be sent to
        ///$mail->addAddress($userpjs->email, 'John Doe');
        $mail->addAddress('hes.faraji@yahoo.com', 'John Doe');
        //Set the subject line
        $mail->Subject = "salam";
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //Replace the plain text body with one created manually

        $mail->Body  ="Name:".$request->name."\n".
        "E-mail: ".$request->email."\n".
        "Nachricht: "."\n".$request->description;

        Session::flash('flash_message', 'Message sent!');
        if (!$mail->send()) {
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'require_fund' => 'digits_between:0,10',
            'photo' => 'image',
        ]);
        $input = $request->all();
        $project=Project::create($input);
        $id=$project->id;
        $pjs = new Projectstatus();
        $pjs->status = 'Inactive';
        $pjs->user_id = Auth::id();
        $pjs->project_id=$id;
        $pjs->save();
        $project->save();

        if ($request->photo) {
            $file = $request->file('photo');
            $destinationPath = 'public/images/catalog';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
            $project->photo = $originalFile;
            $project->save();
        }
        $project->save();
        $pjs->save();

        Session::flash('flash_message', 'Projects successfully added!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show')->withProject($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user) {
            if ($user->authorizeRoles('admin')) {
                $project = Project::findOrFail($id);
                return view('projects.edit')->withProject($project);
            }
            return redirect('activeproject');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $project = Project::findOrFail($id);
        $input = $request->all();
        $project->fill($input)->save();
        return redirect()->back();
        $project = Project::findOrFail($id);
        $title =$request->title;
        $description=$request->description;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user) {
            if ($user->authorizeRoles('admin')) {
                $project = Project::findOrFail($id);
                $project->delete();
                return redirect()->route('projects.index');
            }
            return redirect('activeproject');
        }
    }
}
