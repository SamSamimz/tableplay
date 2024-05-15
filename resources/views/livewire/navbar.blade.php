<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}" wire:navigate>Table</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{auth()->user()->name ?? 'User'}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <form class="mb-3">
                <fieldset disabled>
                  <label for="form-label">Balace :</label>
                  <div class="input-group">
                    <input type="text" name="balance" id="balance" class="form-control text-warning" aria-label="balance" aria-describedby="balance" readonly value="{{@$this->balance ?? '0.00'}} BDT">
                        <span  wire:click='refresh' class="input-group-text bg-primary text-white">
                          <ion-icon name="refresh-outline"></ion-icon>
                        </span>
                      </div>
                    </fieldset>
            </form>
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" href="#">Profile</a>
            </li>
            <hr>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Personal Info</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><button wire:click='logout' class="dropdown-item">Logout</button></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>