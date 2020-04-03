<?php $this->load->view('include/sidebar'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="col-md-12">
        <h1>Peminjaman Buku
            <small>List</small>
            <?php if ($this->session->userdata('level') === '1') : ?>
                <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
            <?php endif; ?>
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="mydata" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Nama Member</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <?php if ($this->session->userdata('level') === '1') : ?>
                        <th style="text-align: right;">Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
        </table>
    </div>
</div>

<!-- MODAL ADD -->
<?php if ($this->session->userdata('level') === '1') : ?>
    <form>
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kode Buku</label>
                            <div class="col-md-10">
                                <input type="text" name="product_code" id="product_code" class="form-control" value="<?php echo sprintf("%04s", $id_pinjam) ?>" readonly>
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
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Perolehan</label>
                            <div class="col-md-10">
                                <select class="form-control" name="perolehan" id="perolehan">
                                    <option>Pembelian</option>
                                    <option>Hadiah</option>
                                </select>
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

    <!-- MODAL EDIT -->
    <form>
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kode Buku</label>
                            <div class="col-md-10">
                                <input type="text" name="product_code_edit" id="product_code_edit" class="form-control" placeholder="Kode Buku" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Produk</label>
                            <div class="col-md-10">
                                <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Nama Buku">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Pengarang</label>
                            <div class="col-md-10">
                                <input type="text" name="pengarang_edit" id="pengarang_edit" class="form-control" placeholder="Pengarang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Penerbit</label>
                            <div class="col-md-10">
                                <input type="text" name="penerbit_edit" id="penerbit_edit" class="form-control" placeholder="Penerbit">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL EDIT-->

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

<!-- MODAL DETAIL -->
<form>
    <div class="modal fade" id="Modal_Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th scope="row">ID Buku </th>
                            <td><input type="text" name="product_code_dt" id="product_code_dt" class="form-control" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Nama </th>
                            <td><input type="text" name="product_name_dt" id="product_name_dt" class="form-control" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Pengarang </th>
                            <td><input type="text" name="pengarang" id="pengarang" class="form-control" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Penerbit </th>
                            <td><input type="text" name="penerbit" id="penerbit" class="form-control" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Perolehan </th>
                            <td><input type="text" name="perolehan" id="perolehan" class="form-control" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL DETAIL-->


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
                url: '<?= base_url() ?>pinjam/pinjam_data',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].nama_bk + '</td>' +
                            '<td>' + data[i].nama_mb + '</td>' +
                            '<td>' + data[i].tgl_pinjam + '</td>' +
                            '<td>' + data[i].tgl_kembali + '</td>' +
                            '<td style="text-align:right;">' +
                            '<?php if ($this->session->userdata('level') === '1') : ?> ' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="' + data[i].id_bk + '" data-product_name="' + data[i].nama_bk + '" data-pengarang="' + data[i].pengarang + '"data-penerbit="' + data[i].penerbit + '">Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="' + data[i].id_bk + '">Delete</a>' +
                            '<?php endif; ?>' +
                            '</td>' +

                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }
        //get data for detail record
        $('#show_data').on('click', '.item_detail', function() {
            var product_code = $(this).data('product_code');
            var product_name = $(this).data('product_name');
            var pengarang = $(this).data('pengarang');
            var penerbit = $(this).data('penerbit');
            var perolehan = $(this).data('perolehan');

            $('#Modal_Detail').modal('show');
            $('[name="product_code_dt"]').val(product_code);
            $('[name="product_name_dt"]').val(product_name);
            $('[name="pengarang"]').val(pengarang);
            $('[name="penerbit"]').val(penerbit);
            $('[name="perolehan"]').val(perolehan);
        });


        //Save product
        $('#btn_save').on('click', function() {
            var product_code = $('#product_code').val();
            var product_name = $('#product_name').val();
            var pengarang = $('#pengarang').val();
            var penerbit = $('#penerbit').val();
            var perolehan = $('#perolehan').val();
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>buku/save',
                dataType: 'json',
                data: {
                    product_code: product_code,
                    product_name: product_name,
                    pengarang: pengarang,
                    penerbit: penerbit,
                    perolehan: perolehan
                },
                success: function(data) {
                    $('[name="product_code"]').val("");
                    $('[name="product_name"]').val("");
                    $('[name="pengarang"]').val("");
                    $('[name="penerbit"]').val("");
                    $('[name="perolehan"]').val("");
                    $('#Modal_Add').modal('hide');
                    location.reload();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click', '.item_edit', function() {
            var product_code = $(this).data('product_code');
            var product_name = $(this).data('product_name');
            var pengarang = $(this).data('pengarang');
            var penerbit = $(this).data('penerbit');

            $('#Modal_Edit').modal('show');
            $('[name="product_code_edit"]').val(product_code);
            $('[name="product_name_edit"]').val(product_name);
            $('[name="pengarang_edit"]').val(pengarang);
            $('[name="penerbit_edit"]').val(penerbit);
        });

        //update record to database
        $('#btn_update').on('click', function() {
            var product_code = $('#product_code_edit').val();
            var product_name = $('#product_name_edit').val();
            var pengarang = $('#pengarang_edit').val();
            var penerbit = $('#penerbit_edit').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('buku/update') ?>",
                dataType: "JSON",
                data: {
                    product_code: product_code,
                    product_name: product_name,
                    pengarang: pengarang,
                    penerbit: penerbit
                },
                success: function(data) {
                    $('[name="product_code_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="pengarang_edit"]').val("");
                    $('[name="penerbit_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
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