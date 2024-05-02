<?php

namespace App\Http\Controllers\Auth;

use App\Services\UserService;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

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
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
//        $this->middleware('guest');
    }

    public function index()
    {
        $users = $this->userService->getUsersList();
        return view('auth.index', compact('users'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        // dd($data);
        $fileName = null;
        if(isset($data['avatar']) && !empty($data['avatar'])){
            $file = $data['avatar'];
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(User::UPLOAD_PATH, $fileName);
        }

        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => isset($data['is_admin']) ? $data['is_admin'] : 0,
            'avatar' => $fileName ? $fileName : null,
        ];
        if($data['id']){
            User::where('id', $data['id'])->update(array(
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_admin' => isset($data['is_admin']) ? $data['is_admin'] : 0,
                'avatar' => $fileName ? $fileName : null,));
        }
        User::create($userData);

        Session::flash('message', 'User created successfully');
        return redirect('users/list');
    }

    public function update(){
        $data = request()->all();
        $fileName = null;
        if(isset($data['avatar']) && !empty($data['avatar'])){
            $file = $data['avatar'];
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(User::UPLOAD_PATH, $fileName);
        }
        User::where('id', $data['id'])->update(array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => isset($data['is_admin']) ? $data['is_admin'] : 0,
            'avatar' => $fileName ? $fileName : null,));

        Session::flash('message', 'User updated successfully');
        return redirect('users/list');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        if(empty($user)){
            return abort(404);
        }

        return view('auth.register', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = User::destroy($id);
        if($deleted){
            return response()->json(['success'=>'200', 'message'=>'Record is deleted']);
        }else{
            return response()->json(['error'=>'', 'message'=>'Record not deleted']);
        }
    }

}
