<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="d-flex">
      <a class="nav-link me-3" href="#"><i class="fas fa-home"></i></a>
      <form class="d-flex me-3" action="search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche" name="query">
      </form>
    </div>
    <div class="w-100 d-none d-lg-block"></div>
    <a class="navbar-brand position-absolute start-50 translate-middle-x d-none d-lg-inline" href="#"><img src="/medias/gg.jpg" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="panier.php"><i class="fas fa-shopping-cart"></i> (<?php echo getCartCount(); ?>)</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-globe"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>