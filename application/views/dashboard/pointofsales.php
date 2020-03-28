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
                        <h1 class="h3 mb-0 text-gray-800">Point of Sales</h1>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <a href="#">Products</a>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-wrap">
                                        <?php foreach ($products as $product) : ?>
                                            <div class="card m-3" style="width: 14rem;">
                                                <img src="<?php echo base_url() ?>upload/product/<?php echo $product->image ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 id="name-<?php echo $product->product_id ?>" value="<?php echo $product->name ?>" class="card-title"><?php echo $product->name ?></h5>
                                                    <p class="card-text">
                                                        <ul class="list-unstyled">
                                                            <li>Price: Rp. <span id="price-<?php echo $product->product_id ?>"><?php echo $product->price ?></span>,-</li>
                                                            <li>Stock: <span id="stock-<?php echo $product->product_id ?>"><?php echo $product->stock ?></span> pcs</li>
                                                        </ul>
                                                    </p>
                                                    <a href="#" onclick="addData()" id="<?php echo $product->product_id ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add</a>
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
                                                <tbody id="invoice-data">
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Total : </th>
                                                        <th id="totalQty">0</th>
                                                        <th id="totalPrice">0</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <hr>
                                        <button type="button" id="btn-payment" class="btn btn-success float-right" data-toggle="modal" data-target="#modalPayment">
                                            Payment
                                        </button>
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
            <?php $this->load->view("dashboard/_includes/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- JavaScript-->
    <?php $this->load->view("dashboard/_includes/js.php") ?>
    <script>
        function addData() {
            var id = event.target.id;
            var name = $("#name-" + id).html();
            var price = $("#price-" + id).html();
            var stock = $("#stock-" + id).html();
            var qty = $("#qty-" + id).html();

            if (stock <= 0) {
                alert("Stock Kosong");
                return false;
            }

            if (qty == undefined) {
                qty = 0;
            }
            qty = parseInt(qty) + 1;
            $("#stock-" + id).html(parseInt(stock) - 1);

            var tr = $("#tr-" + id).html();
            if (tr == undefined) {
                let td = '<tr id="tr-' + id + '"><td>' + name + '</td><td id="qty-' + id + '">' + qty + '</td><td>' + price + '</td></tr>';
                let lastData = $('#invoice-data').html();
                $('#invoice-data').html(lastData + td);

                let input = '<input type="hidden" id="proId'+id+'" name="products[]" value="'+id+' '+qty+'">';
                $("form").append(input);
            } else { 
                $("#proId"+id).val(id+' '+qty);
                $("#tr-" + id).html('<td>' + name + '</td><td id="qty-' + id + '">' + qty + '</td><td>' + price + '</td>');
            }

            var lastTotQty = $("#totalQty").html();
            var lastTotPrice = $("#totalPrice").html();
            var totQty = $("#totalQty").html(parseInt(lastTotQty) + 1);
            var totPrice = parseInt(lastTotPrice) + parseInt(price);
            $("#totalPrice").html(totPrice);
            $("#paymentTotal").val(totPrice);
            console.log(totPrice);
        }
    </script>

    <!-- Scroll to Top Button-->
    <?php $this->load->view("dashboard/_includes/scrolltop.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("dashboard/_includes/modal.php") ?>
    <div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="modalPaymentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPaymentLabel">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('dashboard/transactions/add') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="paymentTotal" class="col-sm-3 col-form-label">Total bill</label>
                        <div class="col-sm-8">
                            <input name="amount" type="text" readonly class="form-control-plaintext" id="paymentTotal" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputStatus" class="col-sm-3 col-form-label">Payment</label>
                        <div class="col-sm-8">
                            <select id="inputStatus" name="status" class="form-control">
                                <option value="1" selected>Bayar Sekarang</option>
                                <option value="0">Bayar Nanti</option>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputWallet" class="col-sm-3 col-form-label">Payment Method</label>
                        <div class="col-sm-8">
                            <select id="inputWallet" name="wallet" class="form-control">
                                <?php foreach ($wallets as $wallet) : ?>                                
                                    <option value="<?php echo $wallet->wallet_id?>"><?php echo $wallet->name?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCustomer" class="col-sm-3 col-form-label">Select Customer</label>
                        <div class="col-sm-8">
                            <select id="inputCustomer" name="customerId" class="form-control">
                                <?php foreach ($customers as $customer) : ?>                                
                                    <option value="<?php echo $customer->customer_id?>"><?php echo $customer->name?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>
                    <input type="hidden" id="kasirId" name="kasirId" value="<?php echo $this->session->userdata('user_logged')->user_id; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <Input type="submit" class="btn btn-primary" value="Ok">
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>