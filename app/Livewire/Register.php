<?php

namespace App\Livewire;

use App\Models\Account;
use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $username = '';
    public $phone = '';
    public $birthdate = '';
    public $email = '';
    public $password = '';
    protected $rules = [
        'name' => 'required|string|min:4',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|string|min:4|unique:users,username',
        'phone' => 'required|unique:users,phone',
        'birthdate' => 'required|date|before:2008-01-01',
        'password' => 'required|min:6|max:16|alpha_num',
    ];
    public function register() {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'birthdate' => $this->birthdate,
            'password' => bcrypt($this->password),
        ]);
        Account::create([
            'user_id' => $user->id,
        ]);
        session()->flash('success','Registration successful');
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.register')->layout('layouts.auth');
    }
}
