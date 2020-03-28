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
                        <h1 class="h3 mb-0 text-gray-800">History Payments</h1>
                    </div>

                    <?php if ($this->session->flashdata('fails')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('fails'); ?>
                        </div>
                    <?php endif; ?>

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
                                            <th>#</th>
                                            <th>No.Payment</th>
                                            <th>ID Transaction</th>
                                            <th>Total Transaction</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($payments as $payment) : ?>
                                            <tr>
                                                <td width="150">
                                                    <?php echo $payment->datetime ?>
                                                </td>
                                                <td>
                                                    <?php echo $payment->payment_id ?>
                                                </td>
                                                <td>
                                                    <?php echo $payment->transaction_id ?>
                                                </td>
                                                </td>
                                                <td id="amt-<?php echo $payment->payment_id ?>">
                                                    <?php echo $payment->amount ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($wallets as $wallet) : ?>
                                                        <?php if ($wallet->wallet_id == $payment->wallet_id) echo $wallet->name ?>
                                                    <?php endforeach ?>
                                                </td>
                                                <td>
                                                    <?php if ($payment->status == 1) echo "Lunas";
                                                    else echo "Belum Lunas" ?>
                                                </td>
                                                <td>
                                                    <?php if ($payment->status == 0) echo '<button type="button" value="'.$payment->payment_id.'" class="btn btn-danger btn-payment" data-toggle="modal" data-target="#modalPayment">Proses Pembayaran</button>' ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

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
    <script>
        $('.btn-payment').click(function() {
            var payment = $(this).attr("value");
            var amount = $('#amt-'+payment).html();
            $('#paymentNo').val(payment);
            $('#paymentTotal').val(amount);
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="modalPaymentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPaymentLabel">Proses Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('dashboard/payments/edit') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="paymentNo" class="col-sm-3 col-form-label">No.Payment</label>
                            <div class="col-sm-8">
                                <input name="payment" type="text" readonly class="form-control-plaintext" id="paymentNo" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paymentTotal" class="col-sm-3 col-form-label">Total bill</label>
                            <div class="col-sm-8">
                                <input name="amount" type="text" readonly class="form-control-plaintext" id="paymentTotal" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputWallet" class="col-sm-3 col-form-label">Payment Method*</label>
                            <div class="col-sm-8">
                                <select id="inputWallet" name="wallet" class="form-control <?php echo form_error('wallet') ? 'is-invalid' : '' ?>">
                                    <option value="0" selected>Pilih meetod pembayaran ...</option>
                                    <?php foreach ($wallets as $wallet) : ?>
                                        <option value="<?php echo $wallet->wallet_id ?>"><?php echo $wallet->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('wallet') ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="1">  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>