<html>
    <head>
    	<!-- <link href="<?php echo base_url('media/css/bootstrap.css');?>" rel="stylesheet">  -->
        <link href="<?php echo base_url('media/css/mediapopup.css');?>" rel="stylesheet">
        
        <script src="<?php echo base_url('media/js/jquery.js');?>"></script>
        <!--  
        <script src="<?php echo base_url('media/js/bootstrap.min.js');?>"></script>
         -->
        <script src="<?php echo base_url('media/js/modalpopup.js');?>"></script>
        <script src="<?php echo base_url('media/js/mediapopup.js');?>"></script>
        <script type="text/javascript">
        	var BASEURL = '<?php echo base_url() ?>';
        	$(document).ready(function(){
        		medpop.init()
            });
        </script>
        
    </head>
    <body>
    	<div class="row-fluid">
    		<div class="span12 combox">
	    		<div id="poplist">
	        		<div id="loading"><div class="spinner"></div></div>
	            </div>
	            <div style="clear: both;"></div>
	            <div class="pagebox"></div>
            </div>
        </div>
   	</div>
    </body>
</html>
