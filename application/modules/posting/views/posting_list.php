<div class="col-sm-9 col-md-10 main">
    <h3 class="page-header">
        <?php echo $title ?>
        <a href="<?php echo site_url('manage/posting/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>JUDUL</th>
                <th>PENULIS</th>
                <th>KATEGORI</th>
                <th>TANGGAL</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <?php
        if (!empty($posting)) {
            foreach ($posting as $row) { ?>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
    <?php   }
        }
        else { ?>
            <tbody>
                <tr>
                    <td colspan="6" align="center">Data Kosong</td>
                </tr>
            </tbody>
  <?php } ?>
    </table>
</div>