<nav class="navbar shadow-md mb-6" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/">
      Tercer parcial
    </a>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbar" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{ url('maestros') }}">
        Maestros
      </a>

      <a class="navbar-item" href="{{ url('cursos') }}">
        Cursos
      </a>
    </div>
  </div>
</nav>