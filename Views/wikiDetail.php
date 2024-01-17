<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
    <h3 class="display-3 font-weight-bold text-white">Wiki Detail</h3>
    <div class="d-inline-flex text-white">
      <p class="m-0"><a class="text-white" href="">Home</a></p>
      <p class="m-0 px-2">/</p>
      <p class="m-0">Wiki Detail</p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- Detail Start -->
<div class="container py-5">
  <div class="row pt-5">
    <div class="col-lg-8">
      <div class="d-flex flex-column text-left mb-3">
        <p class="section-title pr-5">
          <span class="pr-2">Wiki Detail Page</span>
        </p>
        <h1 class="mb-3">
          <?= $data["wikis"]->title ?>
        </h1>
        <div class="d-flex">
          <p class="mr-3"><i class="fa fa-user text-primary"></i> <?= $_SESSION['user']->username ?></p>
          <p class="mr-3"><i class="fa fa-folder text-primary"></i>
            <?= $data["wikis"]->category_name ?>
          </p>
          <p class="mr-3"><i class="fa fa-comments text-primary"></i> 15</p>
        </div>
      </div>
      <div class="mb-5">
        <img class="img-fluid rounded w-100 mb-4" src="assets/uploads/imageWikis/<?= $data["wikis"]->image ?>"
          alt="Image" />
        <p>
          <?= $data["wikis"]->content ?>
        </p>
      </div>
    </div>

    <div class="col-lg-4 mt-5 mt-lg-0">
      <!-- Author Bio -->
      <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
        <?php if (isset($_SESSION['user']->image)): ?>
          <img src="<?= $_SESSION['user']->image ?>" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px" />
        <?php endif; ?>
        <h3 class="text-secondary mb-3">
          <?= $_SESSION['user']->username ?>
        </h3>
      </div>

      <!-- Category List -->
      <div class="mb-5">
        <h2 class="mb-4">Categories</h2>
        <ul class="list-group list-group-flush">
          <?php foreach ($data["categoriesWithWikiCount"] as $category): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              <a href="#">
                <?= $category->name ?>
              </a>
              <span class="badge badge-primary badge-pill">
                <?= $category->wiki_count ?>
              </span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Tag Cloud -->
      <div class="mb-5">
        <h2 class="mb-4">Tag Cloud</h2>
        <div class="d-flex flex-wrap m-n1">
          <?php foreach ($data["tags"] as $tag): ?>
            <a href="#" class="btn btn-outline-primary m-1">
              <?= $tag->name ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Detail End -->