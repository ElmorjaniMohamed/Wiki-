<?php if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_type'])): ?>
    <div class="alert alert-<?php echo $_SESSION['flash_type']; ?> alert-dismissible fade show" role="alert">
        <strong>
            <?php echo ucfirst($_SESSION['flash_type']); ?>!
        </strong>
        <?php echo $_SESSION['flash_message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['flash_message']);
    unset($_SESSION['flash_type']);
endif;
?>

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Tags</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tags</h5>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTagModal"
                        class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i>
                        Add Tag</button>
                    <div class="modal fade" id="addTagModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add tag</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= APP_URL ?>Tag/store" method="post">
                                        <div class="mb-3">
                                            <label for="tagName" class="form-label">Name</label>
                                            <input type="text" name="tag_name" class="form-control" id="tagName"
                                                required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    <b>#</b>
                                </th>
                                <th>Name</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td>
                                        <?= $row->id ?>
                                    </td>
                                    <td>
                                        <?= $row->name ?>
                                    </td>
                                    <td>
                                        <?= $row->create_date ?>
                                    </td>
                                    <td>
                                        <?= $row->update_date ?>
                                    </td>
                                    <td>
                                        <a href="<?= APP_URL ?>Tag/destroy?id=<?= $row->id ?>"><span><i class="bi bi-trash"
                                                    style="color: red;"></i></span></a>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#tagEdit"><span><i
                                                    class="bi bi-pencil-square" style="margin-left: 0.7rem;"></i></span></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="tagEdit" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Tag</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action='<?= APP_URL ?>Tag/update' method="post">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="id" id="editTagId"
                                                            value="<?= $row->id ?>">
                                                        <label for="tagName" class="form-label">Name</label>
                                                        <input type="text" name="tag_name" class="form-control"
                                                            id="tagName" value="<?= $row->name ?>"/>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>