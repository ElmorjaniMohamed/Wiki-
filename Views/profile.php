<!-- Add TinyMCE script -->
<!-- <script src="https://cdn.tiny.cloud/1/rc42racaernzwkvx6bn5it5s2fu73in8n0swr1xqfp2h81c5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<div class="row m-0" style="padding: 2rem; background-color: #17A2B8; ">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <?php if (isset($_SESSION['user']['image'])): ?>
                    <img src="<?= $_SESSION['user']['image'] ?>" alt="Profile" class="rounded-circle" style="width: 8rem">
                <?php endif; ?>
                <h2 class="h3 mt-1">
                    <?= $_SESSION['user']['username'] ?>
                </h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal"
                    data-bs-target="#modalDialogScrollable">
                    <i class="bi bi-plus-circle"></i> Add Wiki
                </button>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card" style="max-height: 35rem; overflow-y: auto;">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <?php if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_type'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['flash_type']; ?> alert-dismissible fade show"
                        role="alert">
                        <strong>
                            <?php echo ucfirst($_SESSION['flash_type']); ?>!
                        </strong>
                        <?php echo $_SESSION['flash_message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                aria-hidden="true">&times;</span> </button>
                    </div>
                    <?php
                    unset($_SESSION['flash_message']);
                    unset($_SESSION['flash_type']);
                endif;
                ?>
                <div class="tab-content py-2">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                        <?php foreach ($data["wikis"] as $wiki): ?>
                            <div class="card mb-3 shadow border-0 outline-0">
                                <img class="card-img-top" src="assets/uploads/imageWikis/<?= $wiki->image ?>" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $wiki->title ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= $wiki->content ?>
                                    </p>
                                    <hr>
                                    <span class="badge badge-<?php
                                    echo ($wiki->status === 'rejected') ? 'danger' :
                                        (($wiki->status === 'pending') ? 'warning' : 'success');
                                    ?>">
                                        <?php echo htmlspecialchars(ucfirst($wiki->status)); ?>
                                    </span>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalEdit">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <!-- End Bordered Tabs -->
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Wiki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL ?>wiki/store" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="title" class="col-form-label text-dark">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="" required />
                    </div>

                    <div class="mb-3">
                        <label for="content" class="col-form-label text-dark">Content</label>
                        <div>
                            <textarea id="tiny" name="content" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="col-form-label text-dark">Image</label>
                        <input name="image" type="file" class="form-control" id="image" accept="image/*" />
                    </div>

                    <div class="mb-3">
                        <label for="category" class="col-form-label text-dark">Category</label>
                        <select name="category_id" class="form-control" id="category" required>
                            <option value="" disabled selected>Select Category</option>
                            <?php foreach ($data["category"] as $category): ?>
                                <option value="<?= $category->id ?>">
                                    <?= $category->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tag" id="" class="col-form-label text-dark">Tags</label>
                        <select name="tags[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                            <?php foreach ($data["tag"] as $tag): ?>
                                <option value="<?= $tag->id ?>">
                                    <?= $tag->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Wiki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Title</label>
                        <input name="title" type="" class="form-control" id="title" value="" />
                    </div>

                    <div class="mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Content</label>
                        <div>
                            <textarea id="tiny" name="content" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Image</label>
                        <input name="image" type="file" class="form-control" id="image" value="" />
                    </div>

                    <div class="mb-3">
                        <label for="category" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Category</label>
                        <select name="category" class="form-control" id="category" value="">
                            <option selected disabled>select Category</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Tags</label>
                        <select name="tag" class="form-control" id="category" value="">
                            <option selected disabled>select Tags</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Initialize TinyMCE -->
<script>
    tinymce.init({
        selector: '#tiny',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image',
        content_style: 'body { font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; font-size: 14px; line-height: 1.6; }'
    });
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>

<script>
    $('.select2').select2({
        maximumSelectionLength: 10,
        tokenSeparators: [',', ' '],
        placeholder: "Select or type keywords",
    });
</script>