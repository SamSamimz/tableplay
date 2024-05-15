    <div class="col-md-9 col-lg-6 mx-auto">
        <div class="bg-white" id="authbox">
            <div class="p-3">
                <h4 class="text-center py-3">Create account for free</h4>
                <form wire:submit.prevent='register'>
                    <div class="mb-3">
                        <label class="form-label" for="name">Full Name :</label>
                        <input wire:model='name' type="text" name="name" id="name" class="form-control @error('name') is-invalid
                        @enderror">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email :</label>
                        <div class="input-group">
                            <input wire:model='email' type="text" name="email" id="email" class="form-control @error('email') is-invalid
                            @enderror" aria-label="email" aria-describedby="email">
                            <span class="input-group-text @error('email') text-danger border-danger
                            @enderror" id="email">@gmail.com</span>
                          </div>
                          @error('email')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone Number :</label>
                        <div class="input-group">
                            <span class="input-group-text @error('phone') text-danger border-danger
                            @enderror" id="phone">+880</span>
                            <input wire:model='phone' type="text" name="phone" class="form-control @error('phone') is-invalid
                            @enderror" aria-label="phone" aria-describedby="phone" >
                        </div>
                        @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                      
                    <div class="mb-3">
                        <label class="form-label" for="birthdate">Birth Date :</label>
                        <input wire:model='birthdate' type="date" min="1990-01-01" name="birthdate" class="form-control @error('birthdate') text-danger border-danger
                        @enderror" >
                        @error('birthdate')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username :</label>
                        <input wire:model='username' type="text" class="form-control @error('username') text-danger border-danger
                        @enderror" id="username" name="username" >
                        @error('username')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password :</label>
                        <input wire:model='password' type="password" name="password" class="form-control @error('password') is-invalid
                        @enderror" id="password">
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning col-12 mb-2">Register</button>
                        <a href="{{route('login')}}" wire:navigate>Login into account</a>
                    </div>
                </form>
            </div>
        </div>
</div>