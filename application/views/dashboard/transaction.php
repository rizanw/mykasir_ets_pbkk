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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Transaksi</h1>
                    </div>

                    <!-- DataTables -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="#"><i class="fas fa-plus"></i></a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date&Time</th>
                                            <th>Cashier</th>
                                            <th>Customer</th> 
                                            <th>Invoice</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transactions as $transaction) : ?>
                                            <tr>
                                                <td width="150">
                                                    <?php echo $transaction->transaction_id ?>
                                                </td>
                                                <td>
                                                    <?php echo $transaction->datetime ?>
                                                </td>
                                                </td>
                                                <td>
                                                    <?php foreach ($cashiers as $cashier) : ?>
                                                    <?php if($cashier->user_id == $transaction->kasir_id) echo $cashier->username ?>
                                                    <?php endforeach ?>
                                                </td>  
                                                <td>                                                
                                                    <?php foreach ($customers as $customer) : ?>
                                                    <?php if($customer->customer_id == $transaction->customer_id) echo $customer->name."( ".$customer->contact." )" ?>
                                                    <?php endforeach ?>
                                                </td>  
                                                <td width="250">
                                                    <a href="<?php echo site_url('dashboard/transactions/invoice/' . $transaction->transaction_id) ?>" class="btn btn-small"><i class="fas fa-list"></i> detail</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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