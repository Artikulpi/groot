    <h3 class="page-header">
        Daftar Kontak
    </h3>

    <!-- Indicates a successful or positive action -->

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="controls" align="center">NAMA</th>
                    <th class="controls" align="center">EMAIL</th>
                    <th class="controls" align="center">PESAN</th>
                    <th class="controls" align="center">TANGGAL</th>
                    <th class="controls" align="center">AKSI</th>
                </tr>
            </thead>
            <?php
            if (!empty($contact)) {
                foreach ($contact as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['contact_name']; ?></td>
                            <td><?php echo $row['contact_email']; ?></td>
                            <td><?php echo $row['contact_message']; ?></td>
                            <td><?php echo pretty_date($row['contact_input_date'], 'l, d-m-Y H:i:s', FALSE); ?></td>
                            <td>
                                <a href="<?php echo site_url('manage/contact/view/'.$row['contact_id']) ?>" class="btn btn-circle btn-primary btn-twitter btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                           <a href="<?php echo site_url('manage/user/delete/'.$row['contact_id']) ?>" class="btn btn-circle btn-danger btn-twitter btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
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


    