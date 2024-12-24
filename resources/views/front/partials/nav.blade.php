<div class="container-fluid">
  <!--Nav-->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand">
        <img src="{{ asset('assets/front/images/Task.png') }}" alt="Task Management" style="height: 50px;" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        
        <form class="d-flex ms-auto">
          <input
            class="form-control me-2 d-none d-lg-block"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button
            class="btn btn-outline-success d-none d-lg-block"
            type="submit"
          >
            Search
          </button>
          <button class="btn btn-outline-success d-lg-none" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </form>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-bell"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bi bi-person-circle"></i>
            </a>
            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdown"
            >
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>