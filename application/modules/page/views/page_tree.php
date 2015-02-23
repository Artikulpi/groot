<div class="col-sm-9 col-md-10 main">
    <?php echo form_open_multipart(current_url()); ?>
    <div class="row page-header">
        <div class="col-sm-9 col-md-6">
            <h3 class="page-title">Susunan Halaman</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-9 col-md-9">
            <div class="span8">
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        <!--S:Level 1-->
                        <?php foreach ($tree as $key => $node): ?>
                            <li class="dd-item" data-id="<?php echo $key; ?>">
                                <div class="dd-handle"><?php echo $node['title']; ?>

                                </div>
                                <!--S:Level 2-->
                                <?php if (count($node['children']) > 0): ?>
                                    <ol class="dd-list">
                                        <?php foreach ($node['children'] as $key => $node): ?>
                                            <li class="dd-item" data-id="<?php echo $key; ?>">
                                                <div class="pull-right tools">
                                                    <a href="<?php echo site_url('gadmin/page/remove_node/' . $node['id']); ?>"><i class="glyphicon glyphicon-trash" style="float: right; margin-left: 5px;"></i></a>
                                                    <?php if (is_page($node)): ?>
                                                        <a href="<?php echo page_tree_url_to_page_edit_url($node); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="dd-handle"><?php echo $node['title']; ?>

                                                </div>
                                                <!--S:Level 3-->
                                                <?php if (count($node['children']) > 0): ?>
                                                    <ol class="dd-list">
                                                        <?php foreach ($node['children'] as $key => $node): ?>
                                                            <li class="dd-item" data-id="<?php echo $key; ?>">
                                                                <div class="pull-right tools">
                                                                    <a href="<?php echo site_url('gadmin/page/remove_node/' . $node['id']); ?>"><i class="glyphicon glyphicon-trash" style="float: right; margin-left: 5px"></i></a>
                                                                    <?php if (is_page($node)): ?>
                                                                        <a href="<?php echo page_tree_url_to_page_edit_url($node); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="dd-handle"><?php echo $node['title']; ?>

                                                                </div>
                                                                <!--S:Level 4-->
                                                                <?php if (count($node['children']) > 0): ?>
                                                                    <ol class="dd-list">
                                                                        <?php foreach ($node['children'] as $key => $node): ?>
                                                                            <li class="dd-item" data-id="<?php echo $key; ?>">
                                                                                <div class="pull-right tools">
                                                                                    <a href="<?php echo site_url('gadmin/page/remove_node/' . $node['id']); ?>"><i class="glyphicon glyphicon-trash" style="float: right; margin-left: 5px"></i></a>
                                                                                    <?php if (is_page($node)): ?>
                                                                                        <a href="<?php echo page_tree_url_to_page_edit_url($node); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                                                    <?php endif; ?></div>
                                                                                <div class="dd-handle"><?php echo $node['title']; ?>

                                                                                </div>

                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    </ol>
                                                                <?php endif; ?>
                                                                <!--E:Level 4-->
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                <?php endif; ?>
                                                <!--E:Level 3-->
                                            </li>
                                        <?php endforeach; ?>
                                    </ol>
                                <?php endif; ?>
                                <!--E:Level 2-->
                            </li>
                        <?php endforeach; ?>
                        <!--E:Level 1-->
                    </ol>
                </div>
                <input id="nestable-output" name="page_tree" type="hidden" />
            </div>
        </div>
        <div class="col-sm-9 col-md-3">
            <div class="form-group">
                <button name="action" type="submit" value="save" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
                <a  href="<?php echo site_url('gadmin/page'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</a>
            </div>
            <hr>
            <div class="form-group">
                <label for="jdl_page">Pilih dari Halaman</label>
                <select name="selectPage" id="selectPage" class="form-control">
                    <option value="0">Tidak</option>
                    <?php foreach ($pages as $page): ?>
                        <option value="<?php echo $page['page_id']; ?>"><?php echo $page['page_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <hr>
                <br><div align="center">-- Atau Input Secara Manual --</div>

                <label for="jdl_menu">Judul</label><br>
                <input id="jdl_menu" name="inputJudul" placeholder="Judul" class="form-control" size="20" type="text"><br>

                <label for="url_menu">URL</label><br>
                <input id="url_menu" name="inputURL" placeholder="URL" class="form-control" size="20" type="text">

                <br><label for="jdl_parent">Induk</label><br>
                <select name="inputParent" class="form-control">
                    <option value="0">Tidak</option>
                    <?php foreach ($this->mptt->get_tree() as $tree): ?>
                        <option value="<?php echo $tree['id']; ?>"><?php echo $tree['title']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <button class="btn btn-primary" type="submit">Tambah</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('media/js/jquery.nestable.js');?>"></script>
<script>

$.extend($.expr[':'], {
  'containsi': function(elem, i, match, array)
  {
    return (elem.textContent || elem.innerText || '').toLowerCase()
    .indexOf((match[3] || "").toLowerCase()) >= 0;
  }
});

$(document).ready(function()
{
    $( ".sortable" ).sortable({cursor: 'move', update: function() {
            var order = $(this).sortable("serialize");
            $('#sortable-output').val(order);
        }
    });
    $( ".sortable" ).disableSelection();

    <?php if($this->router->fetch_method() == 'tree'):?>
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    function friendly_url(str,max) {
      if (max === undefined) max = 32;
      var a_chars = new Array(
        new Array("a",/[áàâãªÁÀÂÃ]/g),
        new Array("e",/[éèêÉÈÊ]/g),
        new Array("i",/[íìîÍÌÎ]/g),
        new Array("o",/[òóôõºÓÒÔÕ]/g),
        new Array("u",/[úùûÚÙÛ]/g),
        new Array("c",/[çÇ]/g),
        new Array("n",/[Ññ]/g)
      );
      // Replace vowel with accent without them
      for(var i=0;i<a_chars.length;i++)
        str = str.replace(a_chars[i][1],a_chars[i][0]);
      // first replace whitespace by -, second remove repeated - by just one, third turn in low case the chars,
      // fourth delete all chars which are not between a-z or 0-9, fifth trim the string and
      // the last step truncate the string to 32 chars 
      return str.replace(/\s+/g,'-').toLowerCase().replace(/[^a-z0-9\-]/g, '').replace(/\-{2,}/g,'-').replace(/(^\s*)|(\s*$)/g, '').substr(0,max);
    }

    // Page tree selectbox onchange
    $('select#selectPage').change(function() {
        var pageText = $('select#selectPage :selected').text();
        $('input#jdl_menu').val(pageText);
        $('input#url_menu').val('page/' + $(this).val() + '/' + friendly_url(pageText));
    });
    <?php endif;?>

});
</script>