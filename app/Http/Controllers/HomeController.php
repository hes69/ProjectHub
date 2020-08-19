<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Projectstatus;
use App\Project;
use App\Assignedproject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function idee()
    {
        return view('projects.idee');
    }

    public function sogehts()
    {
        return view('projects.sogehts');
    }

    public function index(Request $request)
    {
        $pjs = Projectstatus::where('status', 'Active')
        -> orWhere('status','Assigned')
        ->orderBy('id', 'desc')->take(3)->get();
        return view('welcome', array('pjs' => $pjs));

    }
}
