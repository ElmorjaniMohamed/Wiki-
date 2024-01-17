document.getElementById("btn").addEventListener("click", function () {
  var search = document.getElementById("search").value;
  var x = new XMLHttpRequest();
  x.open("GET", "http://localhost/WikiGenius/Search?search=" + search, true);
  x.onreadystatechange = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      JSON.parse(this.response).length
    ) {
      var res = JSON.parse(this.response);

      console.log(res);

      var parent = document.getElementById("parent");
      parent.innerHTML = "";

      res.forEach((wiki) => {
        var div = document.createElement("div");
        div.className = "col-lg-4 mb-4";

        div.innerHTML = `<div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="assets/uploads/imageWikis/${wiki.image}" alt=""
                            style="width: 100%; height: 200px;" />
                            <div class="card-body bg-light text-center p-4">
                            <h4 class="">
                                ${wiki.title}
                            </h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i>
                                ${wiki.category_name} 
                                </small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p class="text-truncate">
                                ${wiki.content}
                            </p>
                            <a href="/WikiGenius/wikiDetail?id=${wiki.id}" class="btn btn-primary px-4 mx-auto my-2">Read
                                More</a>
                            </div>
                        </div>`;

        parent.appendChild(div);
      });
    } else {
      var parent = document.getElementById("parent");
      parent.innerHTML = "<p class='mx-auto text-center'>No result !.</p>";
    }
  };
  x.send();
});

document.getElementById("category").addEventListener("change", function () {
  var category_id = document.getElementById("category").value;
  console.log(category_id);

  var x = new XMLHttpRequest();
  x.open(
    "GET",
    "http://localhost/WikiGenius/Search?category_id=" + category_id,
    true
  );
  x.onreadystatechange = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      JSON.parse(this.response).length
    ) {
      var res = JSON.parse(this.response);

      var parent = document.getElementById("parent");
      parent.innerHTML = "";

      res.forEach((wiki) => {
        var div = document.createElement("div");
        div.className =
          "col-lg-4 mb-4";

        div.innerHTML = `<div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="assets/uploads/imageWikis/${wiki.image}" alt=""
                            style="width: 100%; height: 200px;" />
                            <div class="card-body bg-light text-center p-4">
                            <h4 class="">
                                ${wiki.title}
                            </h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i>
                                ${wiki.category_name} 
                                </small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p class="text-truncate">
                                ${wiki.content}
                            </p>
                            <a href="/WikiGenius/wikiDetail?id=${wiki.id}" class="btn btn-primary px-4 mx-auto my-2">Read
                                More</a>
                            </div>
                        </div>`;

        parent.appendChild(div);
      });
    } else {
      var parent = document.getElementById("parent");
      parent.innerHTML = "<p class='mx-auto text-center'>No result !.</p>";
    }
  };
  x.send();
});
