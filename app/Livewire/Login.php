<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Login extends Component
{
    public $email = '';
    public $password = '';
    public $captcha = '';

    public function render()
    {
        return view('livewire.login');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function checkLogin()
    {
        $this->validate(
            [
                'email' => 'required',
                'password' => 'required',
                'captcha' => 'required|captcha'
            ],
            ['captcha.captcha' => 'Invalid captcha code']
        );

        $credentials = $this->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $userDetails = User::select('id', 'name', 'mobile_no', 'email', 'district', 'user_type', 'is_email_verified')->where('email', $this->email)->get()->toArray()[0];

            if ($userDetails['is_email_verified'] == 0) {
                Session::flush();
                Auth::logout();

                session()->flash('info', 'Please Verify Your Email First');

                return $this->redirect('/login', navigate: true);
            } else {
                Session::put('id', $userDetails['id']);
                Session::put('name', $userDetails['name']);
                Session::put('mobile_no', $userDetails['mobile_no']);
                Session::put('email', $userDetails['email']);
                Session::put('district', $userDetails['district']);
                Session::put('user_type', $userDetails['user_type']);

                session()->flash('info', 'You have Successfully Logged In');
                return $this->redirect('/', navigate: true);
            }
        }

        session()->flash('error', 'Opps! You have entered Invalid Credentials');
        return $this->redirect('/login', navigate: true);
    }
}
