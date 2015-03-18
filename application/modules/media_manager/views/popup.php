<html>
    <head>
         <link href="<?php echo base_url('media/css/bootstrap.css');?>" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php $loop = 1; ?>
                <?php foreach ($images as $image): ?>
                <div class="span6 imgs img-polaroid">
                    <a href="javascript:void(0)" onclick="_(this)"
                        data-id="<?php echo  $image['id']?>"
                        data-name="<?php echo  $image['name']?>"
                        data-source="<?php echo  upload_url($image['name']).'?'.uniqid()?>"
                    >
                            <img src="<?php echo  upload_url($image['name']).'?'.uniqid()?>" class="img-polaroid" width="120px">
                            <!-- 
                            <div class="info">
                                <?php $info = unserialize($image['info']);?>
                                <p>File name : <?php echo  $info['file_name']?></p>
                                <p>File location : <?php echo  $info['file_path']?></p>
                                <p>File size : <?php echo  $info['file_size']?> Kb</p>
                                <p>File width : <?php echo  $info['image_width']?></p>
                                <p>File height : <?php echo  $info['image_height']?></p>
                            </div>
                             -->
                    </a>
                </div>
                <?php if ($loop++ == 2): $loop = 1; ?>
                </div>
                <br/>
                <br/>
                <div class="row-fluid">
                <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>

        <script type="text/javascript">
            if (! window.opener) {
                window.close();
            }

            function _g(obj, name) {
                return obj.getAttribute('data-'+name);
            }

            function _(obj) {
                var image = window.opener.MediaManager.image;
                image.id = _g(obj, 'id');
                image.name = _g(obj, 'name');
                image.source = _g(obj, 'source');

                window.opener.MediaManager.close();
            }
        </script>
        <style>
        .imgs {
        position: relative;
    }
    .imgs .img-holder {
        margin-bottom: 17px;
    }
    .imgs img {
        box-sizing: border-box;
    }
    .imgs .img-info {
        position: absolute;
        width: 100%;
        background: #000;
        opacity: .8;
        color: #fff;
        bottom: 0;
        min-height: 30px;
        text-align: center;
        bottom:17px;
    }
    .imgs .info-news {
        color:#52FF00;
        font-weight: bold;
    }</style>
    </body>
</html>
