<?php if ($_SESSION['user']->role_id != 1) {
  header('Location: ' . APP_URL);
} ?>
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Wikis Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Wikis</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-journal-richtext"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?= $data['totalWikis'] ?>
                  </h6>
                  <span class="small pt-1 fw-bold" style="color: #4154F1;">Total Wikis</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Wikis Card -->

        <!-- Categories Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-bookmark"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?= $data['totalCategories'] ?>
                  </h6>
                  <span class="small pt-1 fw-bold" style="color: #2ECA6A;">Total Categories</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Categories Card -->

        <!-- Tags Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Tags</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-tags" style="color:#22A7F2;"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?= $data['tolatTags'] ?>
                  </h6>
                  <span class="small pt-1 fw-bold" style="color: #22A7F2;">Total Tags</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Tags Card -->

        <!-- Users Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?= $data['totalUsers'] ?>
                  </h6>
                  <span class="small pt-1 fw-bold" style="color: #FF771D;">Total Users</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Users Card -->



        <!-- Users -->
        <!-- Users -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Users</h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['users'] as $index => $user): ?>
                    <tr>
                      <th scope="row">
                        <?= $user->id ?>
                      </th>
                      <td>
                        <?= $user->username ?>
                      </td>
                      <td><a href="#" class="text-primary">
                          <?= $user->email ?>
                        </a></td>
                      <td>
                        <span class="badge <?= ($user->role === 'admin') ? 'bg-warning' : 'bg-success' ?>">
                          <?= $user->role ?>
                        </span>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Users -->
      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">
      <!-- News & Updates Traffic -->
      <div class="card">
        <div class="card-body pb-0">
          <h5 class="card-title">Racent Wikis</h5>

          <div class="news">
            <?php if (empty($data["wikis"])): ?>
              <p class="text-center">Aucun wiki n'a été ajouté.</p>
            <?php else: ?>
              <?php $counter = 0; ?>
              <?php foreach ($data["wikis"] as $wiki): ?>
                <?php if ($wiki->status === 'success' && $counter < 8): ?>
                  <div class="post-item clearfix">
                    <img src="<?= APP_URL?>assets/uploads/imageWikis/<?= $wiki->image ?>" style=" height: 3rem;" alt="">
                    <h4><?=$wiki->title?></h4>
                    <p class="text-truncate"><?=$wiki->content?></p>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div><!-- End sidebar recent posts-->

        </div>
      </div><!-- End News & Updates -->

    </div><!-- End Right side columns -->

  </div>
</section>