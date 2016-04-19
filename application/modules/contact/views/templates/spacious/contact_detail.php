<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2><?php echo $name['contact_value'] ?></h2>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3><?php echo $phone['contact_value'] ?></h3>
            </center>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php if ($this->session->flashdata('incomplete')) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('incomplete') ?>
            </div>
        <?php } elseif ($this->session->flashdata('complete')) { ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data diri anda telah kami simpan, silahkan tunggu balasan kami.
            </div>
            <?php }
        ?>
        <?php
        $div_input = array('class' => 'form-group col-md-6 col-sm-12 col-xs-12');
        $div_submit = array('class' => 'form-group col-md-4 col-md-offset-8');
        $div_textarea = array('class' => 'form-group col-md-12 col-sm-12 col-xs-12');
        $name_data = array('name' => 'name', 'class' => 'form-control', 'placeholder' => 'Nama Lengkap');
        $email_data = array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email');
        $textarea_data = array('name' => 'message', 'class' => 'form-control', 'rows' => 15, 'placeholder' => 'Pesan');
        $submit_data = array('class' => 'form-control btn btn-default', 'value' => 'Kirim');
        echo form_contact(current_url(), '', $name_data, $email_data, $textarea_data, $submit_data, $div_input, $div_submit, $div_textarea)
        ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3><?php echo $address['contact_value'] ?></h3>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3><?php echo $email['contact_value'] ?></h3>
            </center>
        </div>
    </div>
</div>