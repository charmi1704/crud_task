@extends('website.layout.main')

@section('main_code')


<div class="container mt-1">
    <h2>Manage Product</h2>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($product_arr)) {
                        foreach ($product_arr as $w) {
                    ?>
                            <tr>
                                <td><?php echo $w->id; ?></td>
                                <td><?php echo $w->name; ?></td>
                                <td><img src="website/assets/img/product/<?php echo $w->img; ?>" width="100px" /></td>
                                <td><?php echo $w->price; ?></td>
                                <td><?php echo $w->description; ?></td>

                                <td>
                                    <a href="editproduct/<?php echo $w->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete_product/<?php echo $w->id; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td align="center" colspan="7"> Data Not Found </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

</body>

</html>

@endsection