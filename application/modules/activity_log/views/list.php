<div class="col-sm-9 col-md-10 main">

    <h3 class="page-header">
        Daftar Log Aktivitas
    </h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="controls" id="nama" align="center" style="width: 230px;">Tanggal</th>
                <th class="controls" id="alamat" align="center">Penulis</th>
                <th class="controls" id="foto" align="center">Modul</th>
                <th class="controls" id="foto" align="center">Aksi</th>
                <th class="controls" id="foto" align="center">Info</th>
            </tr>
            </thead>
            <?php
            if (!empty($data)) {
                foreach ($data as $row) {
                    ?>
            <tbody>
                    <tr class="isi">
                        <td ><?php echo pretty_date($row['activity_log_date']); ?></td>
                        <td ><?php echo $row['user_name']; ?></td>
                        <td ><?php echo $row['activity_log_module']; ?></td>
                        <td ><?php echo $row['activity_log_action']; ?></td>
                        <td ><?php echo $row['activity_log_info']; ?></td>
                    </tr>
            </tbody>
                    <?php
                }
            } else {
                ?>
            <tbody>
                <tr id="row">
                    <td colspan="5" align="center">Data Kosong</td>
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