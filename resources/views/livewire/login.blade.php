<div class="col-md-9 col-lg-6 mx-auto">
        <div class="bg-white" id="authbox">
            <div class="p-3">
                <h4 class="text-center py-3">Login Now</h4>
                @session('error')
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                    <strong>Wrong! </strong>{{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endsession
                <div>

                </div>
                <form wire:submit.prevent='login'>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username /  Phone :</label>
                        <input wire:model='username' type="text" class="form-control @error('username') is-invalid
                        @enderror" id="username" name="username">
                        @error('username')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password :</label>
                        <input wire:model='password' type="password" class="form-control @error('password') is-invalid
                        @enderror" name="password">
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning col-12 mb-2">Login</button>
                        <a href="{{route('register')}}" wire:navigate>Create an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>