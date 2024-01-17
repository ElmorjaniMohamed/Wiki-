<?php if ($_SESSION['user']->role_id != 1) {
    header('Location: ' . APP_URL);
}?>
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
                                    <td><img src="<?= APP_URL . 'assets/uploads/imageWikis/' . $wiki->image ?>" alt="<?= $wiki->title ?>" style="width: 50px; height: 35px;"></td>
                                    <td><?= $wiki->title ?></td>
                                    <td class="text-truncate"><?= substr($wiki->content, 0, 20) . '...'; ?></td>
                                    <td>
                                        <span class="badge bg-<?=
                                            ($wiki->status === 'rejected') ? 'danger' :
                                            (($wiki->status === 'pending') ? 'warning' : 'success');
                                        ?>"><?php echo htmlspecialchars(ucfirst($wiki->status)); ?></span>
                                    </td>
                                    <td>
                                        <a href="<?= APP_URL . 'wiki/accept?id='. $wiki->id?>"><span><i class="bi bi-check" style="color: green;"></i></span></a>
                                        <a href="<?= APP_URL . 'wiki/reject?id=' . $wiki->id; ?>"><span><i class="bi bi-x" style="color: red;"></i></span></a>
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
