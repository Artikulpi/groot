<div class="col-sm-9 col-md-10 main">
    <h3 class="page-header">
        <?php echo $title ?>
        <a href="<?php echo site_url('manage/posting/add_category'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>NAMA KATEGORI</th>
                <th>OPSI</th>
            </tr>
        </thead>
        <?php
        if (!empty($category)) {
            foreach ($category as $row) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['category_name'] ?></td>
                        <td>
                            <a href="<?php echo site_url('manage/posting/view_category/'.$row['category_id']) ?>">View</a>
                            <a href="<?php echo site_url('manage/posting/category/edit/'.$row['category_id']) ?>">Edit</a>
                        </td>
                    </tr>
                </tbody>
    <?php   }
        }
        else { ?>
            <tbody>
                <tr>
                    <td colspan="5">Data Kosong</td>
                </tr>
            </tbody>
  <?php } ?>
    </table>
</div>