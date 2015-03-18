<div class="col-sm-9 col-md-10 main">
    <div class="box-title">
        <h4>MEDIA MANAGER</h4>
        <div class="btn-gr">
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-9">
             <?php
                if ($this->session->flashdata('error')) {
                    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $this->session->flashdata('error') . '</div>';
                }
                ?>
            <div id="imgholder">
            </div>
        </div>

        <div class="col-md-3">
            <a href="<?php echo site_url('gadmin/media_manager/restore/'.$image['id'])?>" class="btn save btn-primary">Restore</a>
            <button class="btn save btn-primary">Save changes</button><br><br>
            <ul class="nav nav-tabs" id="the-tab">
                <li class="active" data-toggle="#crop">
                    <a href="#crop" data-name="crop">
                        <i class="icon-th-large"></i>
                        <span>Crop</span>
                    </a>
                </li>
                <li class="" data-toggle="#resize">
                    <a href="#resize" data-name="resize">
                        <i class="icon-th-large"></i>
                        <span>Resize</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="crop">
                    <div class="control controls-row">
                        <label>X</label>
                        <div class="input-append">
                            <input type="number" class="input-x" disabled/>
                        </div>
                    </div>
                    <div class="control controls-row">
                        <label>Y</label>
                        <div class="input-append">
                            <input type="number" class="input-y" disabled/>
                        </div>
                    </div>
                    <div class="control controls-row">
                        <label>Width</label>
                        <div class="input-append">
                            <input type="number" class="input-width" disabled/>
                        </div>
                    </div>
                    <div class="control controls-row">
                        <label>Height</label>
                        <div class="input-append">
                            <input type="number" class="input-height" disabled/>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="resize">
                    <div class="control controls-row">
                        <label>Width</label>
                        <div class="input-append">
                            <input type="number" class="input-width"/>
                        </div>
                    </div>
                    <div class="control controls-row">
                        <label>Height</label>
                        <div class="input-append">
                            <input class="input-height" type="number"/>
                        </div>
                    </div>

                    <div class="control controls-row">
                        <button class="btn reset">Reset</button>
                    </div>

                </div>
            </div>

        </div>
        <?php echo form_open(current_url(), array('id'=>'edit-form')) ?>
            <input type="hidden" name="id" value="<?php echo  $image['id']?>"/>

            <input type="hidden" name="x" class="reset"/>
            <input type="hidden" name="y" class="reset"/>
            <input type="hidden" name="width" class="reset"/>
            <input type="hidden" name="height" class="reset"/>
            <input type="hidden" name="action" value="crop"/>
        <?php echo form_close() ?>
    </div>
</div>
<style>
    .box-title {
        position:relative;
    }
</style>
<script type="text/javascript">
    window.img = null;

    var Form = {
        form: function() {
            return $('#edit-form')
        },
        set: function (name, val) {
            Form.form().find('input[name='+name+']').val(val);
            $('.input-'+name).val(val);
            return Form;
        },
        reset: function() {
            Form.form().find('.reset').each(function(){
                $(this).val(0);
            })
            return Form;
        }
    }

    var Image = {
        loaded: false,
        img: null,
        action: 'crop',
        src: '<?php echo upload_url($image['name']) . '?' . uniqid()?>',
        data: [],
        set: function (key, value) {
            Image.data[key] = value;
        },
        get: function (key) {
            return Image.data[key];
        },
        init: function(name) {
            if (window._jcrop) {
                window._jcrop.release();
                $('.jcrop-holder').remove();
            }
            var callback = null;

            if (name == 'crop') {
                callback = Crop.start;
            }
            else {
                callback = Resize.start;
            }

            var first = Image.loadImage(callback);

            Form.reset()
                .set('action', name);

            if (!first) callback.call();
        },
        loadImage: function(callback) {
            if (! Image.img) {
                var img = document.createElement('img');
                img.src = Image.src;

                Image.set('height', img.height);
                Image.set('weight', img.weight);

                $(img).on('load', function() {
                    Image.set('originalImage', [this.naturalWidth,this.naturalHeight]);

                    Image.set('height', this.height);
                    Image.set('weight', this.weight);

                    callback.call();
                })
                    .appendTo('#imgholder');

                Image.img = $(img);
                return true;
            }

            return false;
        }
    };

    var Crop = {
        start: function() {
            var opts = {
                    onSelect: Crop.onselect,
                    trueSize: Image.get('originalImage')
                }
            ;

            Image.img.data('Jcrop', null);

            Image.img.Jcrop(opts, function(){window._jcrop=this});
        },
        onselect: function(c) {
            Form.set('x', c.x)
                .set('y', c.y)
                .set('width', c.w)
                .set('height', c.h)
        },
    }

    var Resize = {
        onResize: function (e) {
            e.preventDefault();
            var pixel = this.value;

            if (this.className == 'input-width') {
                var ratio = Image.get('originalImage')[0] / 100,
                    percent = (pixel/ratio).toFixed(2),
                    width = Math.round(Image.get('originalImage')[0]/100*percent),
                    height = Math.round(Image.get('originalImage')[1]/100*percent)
                ;
            }
            else {
                var ratio = Image.get('originalImage')[1] / 100,
                    percent = (pixel/ratio).toFixed(2),
                    width = Math.round(Image.get('originalImage')[0]/100*percent),
                    height = Math.round(Image.get('originalImage')[1]/100*percent)
                ;
            };

            Form.set('width', width);
            Form.set('height', height);

        },
        start: function () {
            console.count('resize');
            Image.img.css({display:'block',visibility:'visible'});

            $('.input-width')
                .on('change', Resize.onResize)
                .val(Image.get('originalImage')[0]);
            $('.input-height')
                .on('change', Resize.onResize)
                .val(Image.get('originalImage')[1]);

            $('button.reset').on('click', Resize.reset);
        },
        reset: function(e) {
            Form.set('width', Image.get('originalImage')[0])
            Form.set('height', Image.get('originalImage')[1])
        }
    }

    $(function() {
        $('#the-tab a')
            .click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            })
            .on('shown', function(e) {
                Image.init($(this).data('name'));
            })


        Image.init('crop');
        $('.save').on('click', function(e) {
            $('#edit-form').submit();
        });
    })
</script>