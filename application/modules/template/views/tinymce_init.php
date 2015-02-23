<script type="text/javascript" src="<?php echo base_url('media/js/tinymce/tinymce.min.js'); ?>"></script>
<script>
    tinymce.init({
        menu: {// this is the complete default configuration
            file: {title: 'File', items: 'newdocument'},
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link media | template hr'},
            view: {title: 'View', items: 'visualaid'},
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        relative_urls: false,
        theme: "modern",
        selector: 'textarea',
        plugins: "table paste link autolink code",
        tools: "inserttable",
        toolbar1: "uploadimage table | bold italic underline| alignleft aligncenter alignright alignjustify | styleselect formatselect fontsizeselect | link unlink",
        paste_as_text: true
    });

</script>
