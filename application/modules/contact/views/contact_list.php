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
                           <a href="#" kode="<?php echo $row['contact_id'] ?>" class="btn btn-circle btn-danger btn-twitter btn-sm hapus"><i class="glyphicon glyphicon-trash"></i></a>
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
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Data yang dipilih akan dihapus</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary" id="konfirmasi">Ya</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('manage/contact/delete');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('manage/contact');?>";
                }
            });
        });
    });
</script>

    