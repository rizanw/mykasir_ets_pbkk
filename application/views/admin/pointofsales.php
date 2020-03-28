<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_includes/head.php") ?>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_includes/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_includes/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Point of Sales</h1>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <a href="#">Products</a>
                                </div>
                                <div class="card-body" style="padding: 13px">
                                    <div class="d-flex flex-wrap">
                                        <?php foreach ($products as $product) : ?>
                                            <div class="card m-1" style="width: 12rem;">
                                                <img src="<?php echo base_url() ?>upload/product/<?php echo $product->image ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $product->name ?></h5>
                                                    <p class="card-text">Stock: <?php echo $product->stock ?></p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <a href="#">Invoice</a>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>items</th>
                                                        <th>Qty</th>
                                                        <th>price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>Total: <span>0</span></div>
                                        <hr>
                                        <button class="btn btn-success">Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_includes/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_includes/scrolltop.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("admin/_includes/modal.php") ?>

    <!-- JavaScript-->
    <?php $this->load->view("admin/_includes/js.php") ?>
</body>

</html>