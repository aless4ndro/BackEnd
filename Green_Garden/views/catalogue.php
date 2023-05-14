<div class="container mt-5">
  <h1 class="text-center">Catalogue</h1>
  <form class="d-flex mt-4" method="get" action="search_results.php" id="search-form">
    <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche" name="query">
    <button class="btn btn-outline-success" type="submit">Recherche</button>
  </form>
</div>

<div class="container mt-5">
  <div class="row" id="search-results">
    <!-- Les résultats de la recherche seront affichés ici -->
  </div>
</div>
<script src="/js/catalogue.js"></script>