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
                        <h1 class="h3 mb-0 text-gray-800">Wallets</h1>
                    </div>

                    <!-- Add button -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddWallet">
                                        Add Wallet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($wallets as $wallet) : ?>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $wallet->name ?></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo $wallet->amount ?>,-</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-wallet fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

    <!-- JavaScript-->
    <?php $this->load->view("dashboard/_includes/js.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("dashboard/_includes/modal.php") ?>
    <div class="modal fade" id="modalAddWallet" tabindex="-1" role="dialog" aria-labelledby="modalAddWalletLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddWalletLabel">Add Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('dashboard/wallets/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="inputName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAmount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input name="amount" type="number" min="0" class="form-control" id="inputAmount">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDescription" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input name="description" type="text" class="form-control" id="inputDescription">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>