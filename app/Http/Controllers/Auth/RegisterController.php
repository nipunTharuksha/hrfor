<?php
//use App\Designation;
namespace App\Http\Controllers\Auth;
use App\User;
use App\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mainplant;
use App\Subplant;
use Illuminate\Http\Request;


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
    public function __construct()
    {
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
            'nameinfull' => ['required', 'string', 'max:255'],
            'companyid' => ['required','integer','digits:6','unique:users'],
            'companyemail' => ['required','string','email','max:255','unique:users'],
            'datejoinedtocompany' => ['required','date','before:tomorrow'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobilenumber' => ['required','numeric','digits:10','regex:/[0-9]{10}/','unique:users'],
            'address' => ['required','string','max:255','min:15'],
            'birthdate' => ['required','date','before:17 years ago'],//should be greater than 18- check how to validate
            'idnumber' => ['required','regex:/^([0-9]{10})(X|x|V|v)|([0-9]{12})$/'],//add more validations
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
        return User::create([
            'nameinfull' => $data['nameinfull'],
            'companyid' =>$data['companyid'],
            'companyemail' =>$data['companyemail'],
            'datejoinedtocompany' =>$data['datejoinedtocompany'],
            'designation' =>$data['designation'],
            'mainplant' =>$data['mainplant'],
            'subplant' =>$data['subplant'],
            'email' => $data['email'],
            'mobilenumber' =>$data['mobilenumber'],
            'address' =>$data['address'],
            'birthdate' =>$data['birthdate'],
            'idnumber' => $data['idnumber'],
            'gender' =>$data['gender'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm(){

    $designations = Designation::all();
    $mainplants = Mainplant::all();
    $subplants = Subplant::all();

    return view('auth.register', compact('designations','mainplants','subplants'));
}
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = User::where('nameinfull', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::latest()->paginate($perPage);
        }

        return view('auth.index', compact('users'));
    }
}
