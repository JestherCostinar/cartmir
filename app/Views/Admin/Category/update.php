<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
<div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('Admin/layout/inc/sidebar.php'); ?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?= $this->include('Admin/layout/inc/header.php'); ?>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('category') ?>">Category list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                </ol>
                <!-- Page Heading -->
                <!-- <h1 class="h3 mb-3 text-gray-800">Products
                    <a href="<?= base_url('/category/create') ?>" class="btn btn-primary float-right">Update product</a>
                </h1> -->
                <img src="<?= base_url('uploads/' . $category['category_image']) ?>" alt="" width="300px" height="300px">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category information
                        </h6>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="<?= base_url('/category/update/' . $category['id']) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-0 mt-2">
                                <label class="col-md-12 mb-0">Category Name <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" placeholder="Product Name" name="category_name" value="<?= set_value('category_name', $category['category_name']) ?>">
                                </div>
                                <small class=" text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'category_name') : ''; ?></small>
                            </div>
                            <div class="input-group px-2  mt-2">
                                <label class="col-md-12 mb-0">Category Image <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="category_image" value="<?= set_value('category_image', $category['category_name']) ?>">
                                        <label class=" custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="mb-3 mr-0">
                                <small class="text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'category_image') : ''; ?></small>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12 d-flex">
                                    <button type="submit" name="submit" class=" btn btn-success mx-auto mx-md-0 text-white">Update Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?= $this->include('Admin/layout/inc/footer.php'); ?>

        <?= $this->endSection() ?>
        <?= $this->section('script') ?>
        <script>
            CKEDITOR.replace('ck_editor');
        </script>
        <?= $this->endSection() ?>