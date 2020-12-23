<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Selling History</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Buyer</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Seller</th>
                            <th>Total Shopping</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order->getResult('array') as $order) : ?>
                            <tr>
                                <td><?= $order['buyerName']; ?></td>
                                <td><?= $order['buyerEmail']; ?></td>
                                <td><?= $order['buyerAddress']; ?></td>
                                <td><?= $order['sellerName']; ?></td>
                                <td><?= number_to_currency($order['totalBuy'], 'IDR'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
<!-- <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.print.min.js"></script> -->
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url() ?>/assets/pages/datatables.init.js"></script>
<?= $this->endSection() ?>