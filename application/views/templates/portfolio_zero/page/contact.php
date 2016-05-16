<div class="container">
<br><br><br><br><br><br>
<div class="content-section-a margin">
  <div class="container bs-component">

  <div class="col-lg-9 col-sm-9 blackquot">
    <div class="col-lg-12">
      <div class="row">
        <h3 class="endorsed-deal-heading">
          <span>Contact</span><hr class="hr-warning">
        </h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6">

        <div class="box">
          <address class="hidden-xs hidden-sm">
            Jl, Kecapi1 No.52 C2 <br>
            Jagakarsa, Indonesia<br>
            <abbr title="Phone">P:</abbr> +62-812-8169-8041
          </address>

          <address class="hidden-xs hidden-sm">
            <strong>Email</strong><br>
            <a href="mailto:#">artikulpi@gmail.com</a>
          </address>

          <address align="center" class="hidden-lg hidden-md">
            <h1>Jatayu</h1><hr>
            Jl, Kecapi1 No.52 C2 <br>
            Jagakarsa, Indonesia<br>
            <abbr title="Phone">P:</abbr> +62-812-8169-8041
          </address>

          <address align="center" class="hidden-lg hidden-md">
            <strong>Email</strong><br>
            <a href="mailto:#">jatayuav@gmail.com</a>
          </address>
          <div class="hidden-sm hidden-xs">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d628.5137970305132!2d106.82178268977607!3d-6.324349403127491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eddebbd20e67%3A0xd2463beb183e900e!2sJl.+Kecapi+No.52%2C+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12620!5e0!3m2!1sid!2sid!4v1441773737374" 
            width="359" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="hidden-sm hidden-md hidden-lg">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d628.5137970305132!2d106.82178268977607!3d-6.324349403127491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eddebbd20e67%3A0xd2463beb183e900e!2sJl.+Kecapi+No.52%2C+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12620!5e0!3m2!1sid!2sid!4v1441773737374" 
            width="310" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <br>
        <?php
          if (isset($contact)) {
            $id = $contact['contact_id'];
            $contact_name = $contact['contact_name'];
            $contact_email = $contact['contact_email'];
            $contact_subject = $contact['contact_subject'];
            $contact_message = $contact['contact_message'];
          }
          else {
            $contact_name = set_value('contact_name');
            $contact_email = set_value('contact_email');
            $contact_subject = set_value('contact_subject');
            $contact_message = set_value('contact_message');
          }
        ?>
        <?php
        echo validation_errors();
        echo form_open(current_url()); ?>
        <form>
        <?php if (isset($contact)): ?>
          <input type="hidden" name="contact_id" value="<?php echo $contact['contact_id'] ?>" />
          <input type="hidden" name="contact_input_date" value="<?php echo $contact['contact_input_date'] ?>" />
        <?php endif; ?>
          <div class="form-group">
            <input type="text" name="contact_name" class="form-control" id="exampleInputName2" placeholder="Name" value="<?php echo $contact_name ?>">
          </div>
          <div class="form-group">
            <input type="text" name="contact_email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo $contact_email ?>">
          </div>
          <div class="form-group">
            <input type="text" name="contact_subject" class="form-control" id="exampleInputName2" placeholder="Subject" value="<?php echo $contact_subject ?>">
          </div>
          <textarea class="form-control" name="contact_message" rows="7" placeholder="Massage"><?php echo $contact_message ?></textarea>
          <br/>
          <button type="submit" class="btn btn-default col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">Submit</button>
        </form>
        <?php echo form_close(); ?>
      </div>
    </div>
    <br>
    <div class="col-md-12">
      <div class="row">
        <div class="hidden-md hidden-lg hidden-xs">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d628.5137970305132!2d106.82178268977607!3d-6.324349403127491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eddebbd20e67%3A0xd2463beb183e900e!2sJl.+Kecapi+No.52%2C+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12620!5e0!3m2!1sid!2sid!4v1441773737374" 
          width="520" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container -->

</div>
</div>








