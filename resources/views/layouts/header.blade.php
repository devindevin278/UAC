<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">Jobster</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/notification">Notification</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/friends">Friends</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/store">Store</a>
          </li>
        </ul>
        @auth
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/profile">Profile</a>
            </li>
          </ul>
        @else
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/en/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/login">Login</a>
            </li>

            <li class="nav-item ms-5">
              <a class="nav-link active" aria-current="page" href="/en/home">En</a>
            </li>
            <li class="nav-item"><p class="nav-link">|</p></li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/id/home">Id</a>
            </li>
          </ul>
        @endauth
      </div>
    </div>
  </nav>
