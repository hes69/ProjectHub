<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
///use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use App\Role;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('guest');

    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

            $originalFile = 'null';
           // $destinationPath = public_path('uploads/files');
            ////$extension = Input::file('image')->getClientOriginalExtension();
            ///$fileName = uniqid();
           //// file( $data['image'])->move($destinationPath, $fileName);
///



        ////echo $request->image;
       /// if (  dd($this->request->hasFile('image')))
       /// {
          if(Input::file('image')){
          ///  $originalFile = 'hello'
              $file = Input::file('image');
              $destinationPath = 'public/images/avatar';
              $originalFile = $file->getClientOriginalName();
              $file->move($destinationPath, $originalFile);

        }



      ///  $file = $data->file('image');
        //$file = $request->file('image');
        //$destinationPath = 'public/images/catalog';
        //$originalFile = $file->getClientOriginalName();
        ///$file->move($destinationPath, $originalFile);
        ////$project->photo = $originalFile;


        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
          //  'telephone'=> $data['telephone'],
           /// 'street'=> $data['street'],
            //'image' =>    $originalFile,
            ///'city'=> $data['city'],
            ///'postalcode'=> $data['postalcode'],
            'password' => bcrypt($data['password']),
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'normal')->first());
        return $user;

    }

    protected function showadmin()
    {


        return view('auth.adminregister');

    }


    public function admincreate(request $data)
    {

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            ///'telephone'=> $data['telephone'],
            //'street'=> $data['street'],
            ///'city'=> $data['city'],
            //'postalcode'=> $data['postalcode'],
            'password' => bcrypt($data['password']),
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'admin')->first());
        return $user;

    }

}
