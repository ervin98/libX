<?php $this->load->view('include/sidebar'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="col-md-12">
        <h1>Wish
            <small>List</small>
            <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New Wishlist</a></div>
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="mydata" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Judul Buku</th>
                    <th>Penerbit</th>
                    <th>Pengarang</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
        </table>
    </div>
</div>

<!-- MODAL ADD -->

<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New WishList</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">ID</label>
                        <div class="col-md-10">
                            <input type="text" name="wish_code" id="wish_code" class="form-control" value="<?php echo sprintf("%04s", $wish_code) ?>" placeholder="Kode Wish" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Buku</label>
                        <div class="col-md-10">
                            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Nama Buku">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pengarang</label>
                        <div class="col-md-10">
                            <input type="text" name="pengarang" id="pengarang" class="form-control" placeholder="Pengarang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Penerbit</label>
                        <div class="col-md-10">
                            <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Penerbit">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->
<?php if ($this->session->userdata('level') === '1') : ?>
    <!--MODAL DELETE-->
    <form>
        <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Are you sure to delete this record?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL DELETE-->
<?php endif; ?>


<?php $this->load->view('plus/datatable'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        show_product(); //call function show all product

        $('#mydata').DataTable({

        });

        //function show all product
        function show_product() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url() ?>buku/wish_data',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].wish_id + '</td>' +
                            '<td>' + data[i].nama_wish + '</td>' +
                            '<td>' + data[i].pengarang + '</td>' +
                            '<td>' + data[i].penerbit + '</td>' +
                            '<td style="text-align:right;">' +
                            '<?php if ($this->session->userdata('level') === '1') : ?> ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="' + data[i].wish_id + '">Delete</a>' +
                            '<?php endif; ?>' +
                            '</td>' +

                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }


        //Save product
        $('#btn_save').on('click', function() {
            var product_code = $('#wish_code').val();
            var product_name = $('#product_name').val();
            var pengarang = $('#pengarang').val();
            var penerbit = $('#penerbit').val();
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>buku/save_wish',
                dataType: 'json',
                data: {
                    wish_id: product_code,
                    nama_wish: product_name,
                    pengarang: pengarang,
                    penerbit: penerbit,
                },
                success: function(data) {
                    $('[name="wish_code"]').val("");
                    $('[name="product_name"]').val("");
                    $('[name="pengarang"]').val("");
                    $('#Modal_Add').modal('hide');
                    location.reload();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click', '.item_delete', function() {
            var product_code = $(this).data('product_code');

            $('#Modal_Delete').modal('show');
            $('[name="product_code_delete"]').val(product_code);
        });

        //delete record to database
        $('#btn_delete').on('click', function() {
            var product_code = $('#product_code_delete').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('buku/delete') ?>",
                dataType: "JSON",
                data: {
                    product_code: product_code
                },
                success: function(data) {
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    location.reload();
                }
            });
            return false;
        });

    });
</script>