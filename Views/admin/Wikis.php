<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Wikis</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Wikis</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th><b>I</b>mage</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $wiki): ?>
                                <tr>
                                    <td><img src="<?= APP_URL . 'assets/uploads/imageWikis/' . $wiki->image ?>" alt="<?= $wiki->title ?>" style="max-width: 50px; max-height: 50px;"></td>
                                    <td><?= $wiki->title ?></td>
                                    <td><?= $wiki->content ?></td>
                                    <td>
                                        <span class="badge bg-<?=
                                            ($wiki->status === 'rejected') ? 'danger' :
                                            (($wiki->status === 'pending') ? 'warning' : 'success');
                                        ?>"><?php echo htmlspecialchars(ucfirst($wiki->status)); ?></span>
                                    </td>
                                    <td>
                                        <a href="<?= APP_URL . 'wiki/accept/' . $wiki->id; ?>"><span><i class="bi bi-check" style="color: green;"></i></span></a>
                                        <a href="<?= APP_URL . 'wiki/reject/' . $wiki->id; ?>"><span><i class="bi bi-x" style="color: red;"></i></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
