<div class="col-sm-9 col-md-10 main">

    <h3 class="page-header">
        Daftar Halaman
    <a href="<?php echo site_url('gadmin/page/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
</h3>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="controls" align="center">NAMA HALAMAN</th>
                <th class="controls" align="center">PENULIS</th>
                <th class="controls" align="center">STATUS</th>
            </tr>
            </thead>
            <?php
            if (!empty($page)) {
                foreach ($page as $row) {
                    ?>
            <tbody>
                    <tr>
                        <td ><b><a style="float: left;" href="<?php echo site_url('gadmin/page/edit/' . $row['page_id']); ?>" ><?php echo $row['page_name']; ?></a></b></td>
                        <td ><?php echo $row['user_name']; ?></td>
                        <td ><?php echo ($row['page_is_published'] == 0) ? 'Draft' : 'Terbit';?></td>
                    </tr>
            </tbody>
                    <?php
                }
            } else {
                ?>
            <tbody>
                <tr id="row">
                    <td colspan="3" align="center">Data Kosong</td>
                </tr>
            </tbody>
                <?php
                }
                ?>   
            </table>
        </div>
        <div >
            <?php echo $this->pagination->create_links(); ?>
    </div>
</div>