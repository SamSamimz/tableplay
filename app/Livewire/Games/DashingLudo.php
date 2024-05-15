<?php

namespace App\Livewire\Games;

use Livewire\Component;

class DashingLudo extends Component
{
    public $dice1 = 4;
    public $dice2 = 4;
    public $diceRolling = false;
    public $userInput = '';
    public $winningNumber = null;
    public $winningDice = '';
    public $times = 1.0;
    public $bet = 10.0;
    public $result = '';
    public $win = false;
    public $lose = false;
    public $takanai = false;

    public function userBalance() {
        return floatval(auth()->user()->account->balance);
    }

    // protected $rules = [
    //     'userInput' => 'required',
    // ];
    public function bettingOn() {
        $this->win = false;
        $this->lose = false;
        if($this->userBalance() < $this->bet) {
            $this->takanai = true;
            return back();
        }else {
            $this->dispatch('BetOn');
        }
        if($this->userInput) {
            $this->takanai = false;
            $this->dice1 = rand(1,4);
            sleep(1);
            $this->dice2 = rand(1,4);
            $this->winningNumber = $this->dice1 + $this->dice2;
            if(auth()->user()->history) {
                $hasDraw = auth()->user()->history()->where('dice',5)->orderBy('created_at','desc')->take(3)->get();
                if($this->winningNumber == 5 && $hasDraw) {
                    $this->dice1 < 4 ? $this->dice1 += 1 : null;
                    $this->dice2 < 4 ? $this->dice2 += 1 : null;
                    $this->winningNumber = $this->dice1 + $this->dice2;
                }
            }
            auth()->user()->history()->create([
                'dice' => $this->winningNumber,
            ]);
            $this->getWinningDice();
            $this->winner();
        }else {
            return back();
        }
    }

    public function getWinningDice() {
        if($this->winningNumber == 2 || $this->winningNumber == 3 || $this->winningNumber == 4) { 
            $this->winningDice = 'down';
        }
        if($this->winningNumber == 5) { 
            $this->winningDice = 'draw';
            $this->times = 5.5;
        }
        if($this->winningNumber == 6 || $this->winningNumber == 7 || $this->winningNumber == 8) { 
            $this->winningDice = 'up';
        }
    }

    public function winner() {
        if($this->userInput == $this->winningDice) {
            $this->winningCount();
        }else {
            $this->lostCount();
        }
    }

    public function winningCount() {
        $winningAmount = $this->bet * $this->times;
        $this->lose = false;
        $this->win = true;
        auth()->user()->account->update([
            'balance' => $this->userBalance() + $winningAmount,
        ]);
        // $this->getBalance();
        $this->result = "You won = ".$winningAmount;
    }
    public function lostCount() {
        $losingAmount = $this->bet;
        $this->win = false;
        $this->lose = true;
        auth()->user()->account->update([
            'balance' => $this->userBalance() - $losingAmount,
        ]);
        $this->result = "Lose = ". $losingAmount;
    }

    public function render()
    {
        return view('livewire.games.dashing-ludo',
        [
            'animationClass' => 'animated'
        ])->layout('layouts.auth');
    }
}
