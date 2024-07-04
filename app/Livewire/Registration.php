<?php

namespace App\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use App\Rules\EmailValidation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Registration extends Component
{
    public $districtsList;
    public $name = '';
    public $mobile_no = '';
    public $email = '';
    public $district = '';
    public $password = '';
    public $password_confirmation = '';

    public function render()
    {
        $this->districtsList = DB::table('districts')->pluck('name');

        return view('livewire.registration');
    }

    public function save()
    {
        $this->validate(
            [
                'name' => 'required|string|max:250',
                'mobile_no' => 'required|numeric|digits:10',
                'email' => ['required', 'email', 'max:250', 'unique:users', new EmailValidation],
                'district' => 'required',
                'password' => 'required|min:8|confirmed'
            ],
            [
                'password.confirmed' => 'Password and Confirm Password Does not match',
            ]
        );

        DB::beginTransaction();

        try {
            $createUser = User::create([
                'name' => $this->name,
                'mobile_no' => $this->mobile_no,
                'email' => $this->email,
                'district' => $this->district,
                'user_type' => 'User',
                'password' => $this->password
            ]);

            $token = Str::random(64);

            UserVerify::create([
                'id' => Str::uuid()->toString(),
                'user_id' => $createUser->id,
                'token' => $token
            ]);

            Mail::send('emails.emailVerificationEmail', ['token' => $token, 'name' => $this->name], function ($message) {
                $message->to($this->email);
                $message->subject('Email Verification Mail');
            });

            DB::commit();

            session()->flash('info', 'Great! You have Successfully Registered Please Verify Your Email');

            return $this->redirect('/login', navigate: true);
        } catch (Exception $e) {

            DB::rollback();

            DB::table('exceptions')->insert([
                'id' => Str::uuid()->toString(),
                'exception_message' => $e->getMessage(),
                'user_id' => session('id'),
                'created_at' => Carbon::now()
            ]);

            session()->flash('error', 'Something Went to Wrong. Please Contact Administrator');

            return $this->redirect('/registration', navigate: true);
        }
    }

    public function verifyEmail($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry Your Email Cannot be Identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->email_verified_at = Carbon::now();
                $verifyUser->user->save();
                $message = "Your Email is Verified. You Can Now Login.";
            } else {
                $message = "Your Email is already Verified. You can now Login.";
            }
        }

        session()->flash('info',  $message);

        return redirect('/login');
    }
}
