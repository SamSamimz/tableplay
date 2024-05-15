<?php

namespace App\Livewire;

use App\Mail\ConfirmationMail;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use App\Models\UserEmailCode;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Verification extends Component
{

    public $codesending = false;
    public $userInputCode;
    public $verificationCode;
    public $user;
    public $timeRemaining = 60;
    protected $rules = [
        'userInputCode' => 'required',
    ];
    public function mount() {
        $this->user = auth()->user();
    }

    public function decrementTimer()
    {
        if ($this->timeRemaining > 0) {
            $this->timeRemaining--;
        } else {
            $this->reset('verificationCode');
        }
    }

    public function verify() {
        $this->validate();
            $eCode = UserEmailCode::where('user_id',$this->user->id)->first();
            if($eCode && now()->lessThan($eCode->expires_at)) {
                if($this->userInputCode === $eCode->code) {
                    $this->user->email_verified_at = now();
                    UserEmailCode::where('user_id',$this->user->id)->delete();
                    $this->user->save();
                    $bonus = random_int(80,100);
                    auth()->user()->account->update(['balance' => $bonus]);
                    Mail::to($this->user->email)->queue(new ConfirmationMail($bonus));
                    session()->flash('success','User email verify successful');
                    return $this->redirect('/',navigate:true);
                }else {
                    session()->flash('warning','Wrong verification code.');
                    return $this->redirect('/verification',navigate:true);
                }
            }else {
                session()->flash('warning','Verification Time out');
                return $this->redirect('/verification', navigate:true);
            }
    }

    public function sendcode() {
        $this->verificationCode = rand(100000,999999);
        Mail::to(auth()->user()->email)->queue(new VerificationCodeMail($this->verificationCode));
        UserEmailCode::where('user_id',$this->user->id)->delete();
        UserEmailCode::create([
            'user_id' => $this->user->id,
            'code' => $this->verificationCode,
            'expires_at' => now()->addMinutes(1),
        ]);
        $this->codesending = true;
    }

    public function render()
    {
        return view('livewire.verification')->layout('layouts.auth');
    }
}
