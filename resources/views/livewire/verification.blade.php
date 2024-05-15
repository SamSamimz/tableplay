<div class="col-md-9 col-lg-6 mx-auto">
    <div class="bg-white" id="authbox">
        <div class="p-3">
            <h4 class="text-center py-3">Verify you email.</h4>
            @session('error')
            <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                <strong>Wrong! </strong>{{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endsession

            @if ($codesending)
            <form wire:submit.prevent='verify'>
                <div class="mb-3">
                    <label class="form-label" for="vcode">Enter your verification code :</label>
                    <input wire:model='userInputCode' type="text" id="vcode" class="form-control">
                    @error('userInputCode')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div wire:poll.1000ms="decrementTimer" class="text-danger">Time remaining: {{ $timeRemaining }} seconds</div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning col-12 mb-2">Verify</button>
                </div>
            </form>
            @else
            <form wire:submit.prevent='sendcode'>
                <fieldset disabled>
                    <div class="mb-3">
                        <label class="form-label" for="username">Your email address :</label>
                        <input type="text" class="form-control" value="{{auth()->user()->email}}">
                    </div>
                </fieldset>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning col-12 mb-2">Send code</button>
                </div>
            </form>

            @endif

        </div>
    </div>
</div>