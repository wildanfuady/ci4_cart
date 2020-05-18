<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codeigniter 4 Shopping Cart by Ilmu Coding</title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Tutorial Codeigniter 4 Shopping Cart</h1>
        <div class="card">
            <div class="card-header">List Cart</div>
                <div class="card-body">
                    <!-- tampilkan pesan success -->
                    <?php if(session()->getFlashdata('success') != null){ ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                    <?php } ?>
                    <!-- selesai menampilkan pesan success -->
                    <?php if(count($items) != 0){ // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: ?>
                    <div class="table-responsive">
                        <?php echo form_open('cart/update'); ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $key => $item) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><img src="<?php echo base_url('images/'.$item['photo']); ?>" width="100px"></td>
                                    <td>
                                        <input type="number" name="quantity[]" min="1" class="form-control" value="<?php echo $item['quantity']; ?>" style="width:50px">
                                    </td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                    <td>Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                            <a href="<?php echo base_url('cart/remove/'.$item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?')"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" class="text-right">Jumlah</td>
                                    <td>Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php echo form_close(); ?>
                    
                    </div>
                    <?php } // selesai menampilkan list cart dalam bentuk table ?>

                    <?php if(count($items) == 0){ // jika cart kosong, maka tampilkan: ?>
                    Keranjang belanja Anda sedang kosong. <a href="<?php echo base_url('product'); ?>" class="btn btn-success">Belanja Yuk</a>
                    <?php } else { // jika cart tidak kosong, tampilkan: ?>
                        <a href="<?php echo base_url('product'); ?>" class="btn btn-success">Lanjut Belanja</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>