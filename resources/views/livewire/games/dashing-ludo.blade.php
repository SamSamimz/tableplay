<div class="container">
    <div>
        <h3 class="text-center py-2">Dashing Dice</h3>
        <audio src="{{asset('rolling-dice.mp3')}}" id="myAudio"></audio>
    </div>
    
    <div class="col-md-8 mx-auto">
        <div class="bg-white rounded p-2">
            {{-- Roller dice --}}
            <div class="col-3 mx-auto">
                <div id="dicebox" class="d-flex gap-2">
                    <div>
                        <div id="dice" class="diceRoller">
                            @if ($dice1)
                            @for ($i = 0; $i < $dice1; $i++)
                            <span></span>
                            @endfor
                            @endif
                        </div>
                    </div>
                    <div>
                        <div id="dice" class="diceRoller">
                            @if ($dice2)
                            @for ($i = 0; $i < $dice2; $i++)
                            <span></span>
                            @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- Roller dice --}}
            <div>
                <div class="pb-3">
                    @if ($this->winningNumber)
                    <div>
                        {{"Winner : ". @$this->winningNumber}}
                    </div>
                    @endif
                </div>
                @if ($win)
                <div class="text-success">
                    {{@$this->result}}
                </div>
                @elseif ($lose)
                <div class="text-danger">
                    {{@$this->result}}
                </div>
                @endif
                @if ($takanai)
                <div class="text-danger">You are a gorib😂.</div>
                @endif
            </div>

            <form wire:submit.prevent='bettingOn'>
                <div>
                    <div class="button-group">
                        <input wire:model='userInput' type="radio" id="down" name="userDice" value="down">
                        <label for="down">2-4</label>
                        <input wire:model='userInput' type="radio" id="draw" name="userDice" value="draw">
                        <label for="draw"><span>5</span></label>
                        <input wire:model='userInput' type="radio" id="up" name="userDice" value="up">
                        <label for="up">6-8</label>
                      </div>                
                </div>
    
                {{-- Footer --}}
                <div class="w-full mt-5 d-flex align-items-center justify-content-between">
                    <div>Balance : <span class="text-info">{{number_format(auth()->user()->account->balance,2) ?? '0.00'}}</span></div>
                    <div>
                        <select wire:model='bet' name="bet" id="bet" class="form-select">
                            <option value="10.0">10 BDT</option>
                            <option value="20.0">20 BDT</option>
                            <option value="30.0">30 BDT</option>
                            <option value="50.0">50 BDT</option>
                            <option value="100.0">100 BDT</option>
                            <option value="200.0">200 BDT</option>
                        </select>
                    </div>
                    
                    <div>
                        <button id="roll-dice" class="btn btn-primary">Play <span wire:loading class="spinner-border spinner-border-sm" role="status">
                        </span></button>
                    </div>
                </div>
            </form>


            {{-- Footer --}}
        </div>
    </div>

</div>
