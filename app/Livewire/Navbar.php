<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Navbar extends Component
{
    public $balance = null;
    public function mount() {
        $this->getBalance();
    }
    public function refresh() {
        $this->getBalance();
    }
    public function getBalance() {
        if(auth()->user()->account) {
            $this->balance = auth()->user()->account->balance;
        }
    }

    public function logout() {
        Auth::logout();
        session()->flash('success','You have been logged out');
        return redirect()->to('/login');
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
