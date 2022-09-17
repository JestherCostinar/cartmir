<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
<?= $this->include('Admin/layout/inc/navbar.php'); ?>

<section class="dasbord_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12 dasbord_subbox">
                <?= $this->include('Admin/layout/inc/sidebar.php'); ?>

                <div class="right_box">
                    <div class="table_box1 p-5">
                        <?php if (session()->get('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= (session()->get('success')) ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <h3>Category List
                            <a href="<?= base_url('/category/create') ?>" class="btn btn-primary float-right">Add Category</a>
                        </h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="20%">Category Name</th>
                                    <th>Image</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $i => $category) : ?>
                                    <tr>
                                        <!-- <td><?= $i + 1; ?></td> -->
                                        <td><?= $category['category_name']; ?></td>
                                        <td><img src="<?= base_url('uploads/' . $category['category_image']) ?>" alt="" width="300px" height="300px"></td>
                                        <td>
                                            <a href="<?= base_url('category/update/' . $category['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                                            <a href="<?= base_url('category/delete/' . $category['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>