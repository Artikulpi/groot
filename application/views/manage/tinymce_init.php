<script type="text/javascript" src="<?php echo media_url('media/js/tinymce/tinymce.min.js'); ?>"></script>
<script>

    var MEDIAURL = "<?php echo $this->config->item('media_url') ?>";

    tinymce.init({
        menu: {
            file: {title: 'File', items: 'newdocument'},
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link media | template hr'},
            view: {title: 'View', items: 'visualaid'},
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        setup: function(ed) {
            ed.addButton('uploadimage', {
                title: 'Upload Image',
                image: MEDIAURL +'/media/image/social_6.png',
                onclick: function() {
                    $('#opentiny').trigger('click');
                }
            });
        },
        relative_urls: false,
        theme: "modern",
        selector: '.tinymce-init',
        plugins: "table paste link autolink code",
        tools: "inserttable",
        toolbar1: "uploadimage table | bold italic underline| alignleft aligncenter alignright alignjustify | styleselect formatselect fontsizeselect | link unlink",
        paste_as_text: true
    });

</script>
