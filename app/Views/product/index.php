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
        <h3 class="text-center mb-5">Tutorial Codeigniter 4 Shopping Cart by Ilmu Coding</h3>
        <div class="card">
            <div class="card-header">
                List Product
                <a class="btn btn-success btn-sm float-right" href="<?php echo base_url('cart'); ?>"><i class="fa fa-cart-plus"></i> <?php echo count($total); ?></a>
            </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('success') != null){ ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                    <?php } ?>
                    <?php if(session()->getFlashdata('error') != null){ ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Desc</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $key => $item) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                    <td><?php echo $item['description']; ?></td>
                                    <td><img src="<?php echo base_url('images/'.$item['photo']); ?>" width="100px"></td>
                                    <td>
                                        <a href="<?php echo base_url('cart/beli/'.$item['id']); ?>" class="btn btn-primary">Beli</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>