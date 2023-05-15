document.addEventListener("DOMContentLoaded", function () {
  const searchForm = document.getElementById("search-form");
  const searchResults = document.getElementById("search-results");

  searchForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(searchForm);
    const query = formData.get("query");

    fetch('/views/catalogue.php?query=' + query)
      .then((response) => response.text())
      .then((html) => {
        searchResults.innerHTML = html;
      });
  });
});
