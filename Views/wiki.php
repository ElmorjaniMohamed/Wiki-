<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
    <h3 class="display-3 font-weight-bold text-white">Wikis</h3>
    <div class="d-inline-flex text-white">
      <p class="m-0"><a class="text-white" href="">Home</a></p>
      <p class="m-0 px-2">/</p>
      <p class="m-0">Wikis</p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- wiki Start -->
<div class="container-fluid pt-5">
  <div class="container">
    <div class="text-center pb-2">
      <p class="section-title px-5">
        <span class="px-2">Latest Articles</span>
      </p>
      <h1 class="mb-4">Latest Articles from WikiGenius</h1>
    </div>

    <!-- Search start -->
    <div class="container mb-5 mt">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card p-3 py-2" style="border-radius: 3rem;">
            <div class="row g-3">
              <div class="col-md-3 my-2">
                <div class="dropdown" style="text-align:center;">
                  
                  <select class="form-select btn btn-secondary" aria-label="Default select example" id="category">
                    <option class="d-none" selected disabled>Filter By Category</option>
                    <?php foreach ($data["categories"] as $category): ?>
                    <option name="category" class="text-left" value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach ?>
                  </select>

                

                </div>
              </div>
              <div class="col-md-6 my-2">
                <input type="text" id="search" class="form-control" style="border-radius: 3rem;"
                  placeholder="Search...">
              </div>
              <div class="col-md-3 my-2">
                <button id="btn" class="btn btn-secondary btn-block">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search end -->

    <div id="parent" class="row pb-3 justify-content-center">
      
      <?php if (empty($data["wikis"])): ?>
        <p class="text-center">Aucun wiki n'a été ajouté.</p>
      <?php else: ?>
        <?php foreach ($data["wikis"] as $wiki): ?>
          <?php if ($wiki->status === 'success'): ?>
            <div class="col-lg-4 mb-4">
              <div class="card border-0 shadow-sm mb-2">
                <img class="card-img-top mb-2" src="assets/uploads/imageWikis/<?= $wiki->image ?>" alt=""
                  style="width: 100%; height: 200px;" />
                <div class="card-body bg-light text-center p-4">
                  <h4 class="">
                    <?= $wiki->title ?>
                  </h4>
                  <div class="d-flex justify-content-center mb-3">
                    <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                    <small class="mr-3"><i class="fa fa-folder text-primary"></i>
                      <?= $wiki->category_name ?>
                    </small>
                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                  </div>
                  <p class="text-truncate">
                    <?= $wiki->content ?>
                  </p>
                  <a href="<?= APP_URL ?>wikiDetail?id=<?= $wiki->id ?>" class="btn btn-primary px-4 mx-auto my-2">Read
                    More</a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>


    </div>
    <div class="col-md-12 mb-4">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mb-0">
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- wiki End -->

<script src="<?= APP_URL?>public/assets/js/search.js"></script>