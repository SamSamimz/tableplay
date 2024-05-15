<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $username; 
    public $password; 
    public $user = null;
    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];
    public function login() {
        $this->validate();
        $this->user = User::where('username',$this->username)->orWhere('email',$this->username)->first();
        if($this->user && Hash::check($this->password,$this->user->password)) {
            Auth::login($this->user);
            session()->flash('success','Login successfully');
            return $this->redirect('/',navigate:true);
        }else {
            session()->flash('error','Invalid username or password');
            // $this->addError('username', 'These credentials do not match our records.');
        }
    }
    public function render()
    {
        return view('livewire.login')->layout('layouts.auth');
    }
}
