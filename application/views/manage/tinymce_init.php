<script type="text/javascript" src="<?php echo media_url('/js/tinymce/tinymce.min.js'); ?>"></script>
<script>
  tinymce.init ({
    selector: 'textarea',
    height: 150,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  });
</script>