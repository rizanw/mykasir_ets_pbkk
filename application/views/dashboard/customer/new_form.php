<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("dashboard/_includes/head.php") ?>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("dashboard/_includes/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("dashboard/_includes/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Customer</h1>
                    </div>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('dashboard/customers/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">

                            <form action="<?php echo site_url('dashboard/customers/add') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Customer name" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('name') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact*</label>
                                    <input class="form-control <?php echo form_error('contact') ? 'is-invalid' : '' ?>" type="text" name="contact" placeholder="Customer contact" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('contact') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="points">Points*</label>
                                    <input class="form-control <?php echo form_error('points') ? 'is-invalid' : '' ?>" type="number" name="points" min="0" value="0" placeholder="Customer points" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('points') ?>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="name">Details</label>
                                    <textarea class="form-control <?php echo form_error('details') ? 'is-invalid' : '' ?>" name="details" placeholder="Customer Details..."></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('details') ?>
                                    </div>
                                </div>

                                <input class="btn btn-success" type="submit" name="btn" value="Save" />
                            </form>

                        </div>

                        <div class="card-footer small text-muted">
                            * required fields
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php $this->load->view("dashboard/_includes/footer.php") ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <?php $this->load->view("dashboard/_includes/scrolltop.php") ?>

        <!-- Logout Modal-->
        <?php $this->load->view("dashboard/_includes/modal.php") ?>

        <!-- JavaScript-->
        <?php $this->load->view("dashboard/_includes/js.php") ?>
</body>

</html>