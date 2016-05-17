
<br><br><br><br><br class="hidden-xs">
<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-6">

      <div class="box">
        <?php echo $contact['setting_value'] ?>
        <div class="hidden-sm hidden-xs">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d628.5137970305132!2d106.82178268977607!3d-6.324349403127491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eddebbd20e67%3A0xd2463beb183e900e!2sJl.+Kecapi+No.52%2C+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12620!5e0!3m2!1sid!2sid!4v1441773737374" 
          width="459" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="hidden-sm hidden-md hidden-lg">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d628.5137970305132!2d106.82178268977607!3d-6.324349403127491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eddebbd20e67%3A0xd2463beb183e900e!2sJl.+Kecapi+No.52%2C+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12620!5e0!3m2!1sid!2sid!4v1441773737374" 
          width="310" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="row">
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->session->flashdata('success') ?>
          </div>
        <?php endif; ?>
        <?php //echo validation_errors(); ?>
        <?php echo form_open(current_url()); ?>
        <form>
          <!-- <div class="form-group">
            <input type="hidden" name="contact_id" class="form-control">
            <input type="hidden" name="contact_input_date" class="form-control">
          </div> -->
          <div class="form-group">
            <input type="text" name="contact_name" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <input type="email" name="contact_email" class="form-control" placeholder="Email">
          </div>
          <textarea name="contact_message" class="form-control" rows="7" placeholder="Massage"></textarea>
          <br/>
          <button type="submit" class="btn btn-default col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">Submit</button>
        </form>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <br>
</div>
