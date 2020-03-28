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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Customer</h1>
                    </div>

                    <!-- DataTables -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('dashboard/customers/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Points</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($customers as $customer) : ?>
                                            <tr>
                                                <td width="150">
                                                    <?php echo $customer->customer_id ?>
                                                </td>
                                                <td>
                                                    <?php echo $customer->name ?>
                                                </td>
                                                </td>
                                                <td>
                                                    <?php echo $customer->contact ?>
                                                </td>
                                                <td>
                                                    <?php echo $customer->points ?>
                                                </td>
                                                <td class="small">
                                                    <?php echo  $customer->details  ?> 
                                                </td>
                                                <td width="250">
                                                    <a onclick="deleteConfirm('<?php echo site_url('dashboard/customers/delete/' . $customer->customer_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

    <!-- delete modal-->
    <!-- Logout Delete Confirmation-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>