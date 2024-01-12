<div class="row m-0" style="padding: 2rem; background-color: #17A2B8; ">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
                <h2>Kevin Anderson</h2>
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
                <div class="tab-content py-2">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="card mb-3 shadow border-0 outline-0" >
                            <img class="card-img-top" src="..." alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and
                                    make up the bulk of the card's content.
                                </p>
                                <hr>
                                <span class="badge badge-success">Success</span>
                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                        <div class="card mb-3 shadow border-0 outline-0" >
                            <img class="card-img-top" src="..." alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <div style="max-height: 10rem; overflow-y: auto;">
                                <p class="card-text">
                                    Some quick example text to build on the card title and
                                    make up the bulk of the card's content.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem ut, ratione ducimus aspernatur saepe iusto minima a qui, quibusdam molestiae esse error impedit, sed distinctio architecto pariatur. Ab, recusandae ex?
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta blanditiis, nobis odio rem inventore sunt qui sit laudantium eos atque praesentium ipsa tenetur. Quidem fugit dolorem, dolore deserunt natus cumque!
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium eligendi, est at incidunt quam molestias maxime tempore autem ad necessitatibus labore veritatis sed qui, deleniti recusandae beatae illo, non quasi.
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, doloremque. Eveniet, quis magni ducimus veritatis assumenda numquam quia voluptates aperiam blanditiis quidem non soluta. Voluptatum dolorem dolore culpa aliquid blanditiis.
                                </p>
                                </div>
                                <hr>
                                <span class="badge badge-success">Success</span>
                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </div>
                        </div>
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
                <form id="createWikiForm">

                    <div class="mb-3">
                        <label for="title" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="" />
                    </div>

                    <div class="mb-3">
                        <label for="content" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Content</label>
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
                        <label for="tag" class="col-md-4 col-lg-3 col-form-label p-0 text-dark">Tags</label>
                        <select name="tag" class="form-control" id="tag" value="">
                            <option selected disabled>select Tags</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="createWiki()">Save</button>
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