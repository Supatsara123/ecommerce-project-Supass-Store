<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            'name' => ['required', 'string', 'max:255', 'unique:users,name',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // public function registerStep1(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     $user = $this->create($request->all());

    //     return redirect()->route('register.step2')
    //         ->with('status', 'Step 1 complete. Please fill in additional details.');
    // }

    // public function showStep2Form()
    // {
    //     return view('auth.register_step2');
    // }

    // public function completeRegistration(Request $request)
    // {
    //     // Custom Error Messages
    //     $messages = [
    //         'fname.required' => 'First name is required.',
    //         'lname.required' => 'Last name is required.',
    //         'gender.required' => 'Gender is required.',
    //         'dateOfBirth.required' => 'Date of Birth is required.',
    //         'phone.required' => 'Phone number is required.',
    //         'house_number.required' => 'House/Unit number is required.',
    //         'moo.required' => 'Moo is required.',
    //         'soi.required' => 'Soi is required.',
    //         'road.required' => 'Road name is required.',
    //         'province.required' => 'Province name is required.',
    //         'district.required' => 'District name is required.',
    //         'sub_district.required' => 'Sub-district name is required.',
    //         'postal_code.required' => 'Postal code is required.',
    //     ];

    //     $request->validate([
    //         'fname' => 'required|string|max:255',
    //         'lname' => 'required|string|max:255',
    //         'gender' => 'required|string',
    //         'dateOfBirth' => 'required|date',
    //         'phone' => 'required|string|max:20',
    //         'house_number' => 'required|string|max:255',
    //         'moo' => 'required|string|max:255',
    //         'soi' => 'required|string|max:255',
    //         'road' => 'required|string|max:255',
    //         'province' => 'required|string|max:255',
    //         'district' => 'required|string|max:255',
    //         'sub_district' => 'required|string|max:255',
    //         'postal_code' => 'required|string|max:10',
    //     ], $messages);

    //     // $user = User::where('id', Auth::id())->first();
    //     // $user = auth()->user();
    //     // $user->update($request->all());

    //     // Update user's profile fields
    //     if(Auth::user()->phone == NULL)
    //     {
    //         $user = User::where('id', Auth::id())->first();
    //         $user->fname = $request->input('fname');
    //         $user->lname = $request->input('lname');
    //         $user->gender = $request->input('gender');
    //         $user->dateOfBirth = $request->input('dateOfBirth');
    //         $user->phone = $request->input('phone');
    //         $user->house_number = $request->input('house_number');
    //         $user->moo = $request->input('moo');
    //         $user->soi = $request->input('soi');
    //         $user->road = $request->input('road');
    //         $user->province = $request->input('province');
    //         $user->district = $request->input('district');
    //         $user->sub_district = $request->input('sub_district');
    //         $user->postal_code = $request->input('postal_code');
    //         $user->update();
    //     }
    //     // $user->update([
    //     //     'fname' => $request->fname,
    //     //     'lname' => $request->lname,
    //     //     'gender' => $request->gender,
    //     //     'dateOfBirth' => $request->dateOfBirth,
    //     //     'phone' => $request->phone,
    //     //     'house_number' => $request->house_number,
    //     //     'moo' => $request->moo,
    //     //     'soi' => $request->soi,
    //     //     'road' => $request->road,
    //     //     'province' => $request->province,
    //     //     'district' => $request->district,
    //     //     'sub_district' => $request->sub_district,
    //     //     'postal_code' => $request->postal_code,
    //     // ]);

    //     return redirect()->route('home')
    //         ->with('status', 'Registration complete! Welcome to the platform.');
    // }
}
