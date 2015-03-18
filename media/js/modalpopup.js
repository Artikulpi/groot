$(document).ready(function(){
	var popmedia = {
		createModal : function () {
			var myModal = $('<div/>').addClass('modal fade').attr({id:'myModal', tabindex: '-1', role:'dialog',
							'aria-labelledby':'myModalLabel', 'aria-hidden':'true'});
			var mod_dialog	= $('<div/>').addClass('modal-dialog');
			var mod_content	= $('<div/>').addClass('modal-content');
			var mod_header	= $('<div/>').addClass('modal-header'),
			btn_x			= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',
			pop_title		= '<h3 id="img_title">Image gallery</h3>';
			
			var mod_body	= $('<div/>').addClass('modal-body');
			var mod_footer	= $('<div/>').addClass('modal-footer'),
			btn_close		= '<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>';
			
			$(mod_header).append(btn_x).append(pop_title);
			$(myModal).append(mod_dialog);
                        $(mod_dialog).append(mod_content);
                        $(mod_content).append(mod_header).append(mod_body).append(mod_footer);
			
			
			$('body').append(myModal);
		}
	}
	popmedia.createModal();
	
	var mmedia = {
		tfrom : 'box',
		tipe : '',
		from : '',
		onlylink : 0,
		shortpath : 0,
		//ismultiple : 0,
		getData : function (tipe, from, start) {
			/*if(typeof(multi) != 'undefined')
				mmedia.ismultiple = multi;*/
			if(typeof(onlylink) != 'undefined')
				mmedia.onlylink = onlylink;
			if(typeof(shortpath) != 'undefined')
				mmedia.shortpath = shortpath;
			
			$('#myModal').modal();
			
			$('.modal-body').html('');
			// change background modal
			mmedia.whiteBg();
			
			if(typeof(start) == 'undefined')
				start = 1;
			var tipe_call = 'gadmin/media_manager';
			if(tipe == 'album')
				tipe_call = 'media_manager/media_album_admin';
			
			var urlget = BASEURL+'index.php/'+tipe_call+'/listAjax/';
			
			if(start > 0)
				urlget += start+'/';
			if(tipe=='files')
				urlget += '1/';
			
			$.ajax({
				url			: urlget,
				type		: "GET",
				dataType	:'json',
				beforeSend	: function() {
				},
				success	: function(data){
					if(tipe=='files')
						mmedia.filelist(tipe, from, data);
					else
						mmedia.listing(tipe, from, data);
				},
				error	: function (e) {
				}
			});
		},
		listing : function (tipe, from, data) {
			mmedia.resize();
			var polhead = mmedia.polhead(tipe);
			$('.modal-body').append(polhead);
			
			var gallery  = $('<ul/>').addClass('gallery');
			$(data.images).each(function (index, value) {
				if(typeof(value.info_ex) != 'undefined')
					sr_img = BASEURL+'uploads/'+value.info_ex.file_name;
				else
					sr_img = BASEURL+'media/image/icon-album.png';
				var img	= $('<img/>').attr({src:sr_img});//.addClass('')
				var crop = $('<div/>').addClass('crop');
				var li = $('<li/>').append(crop.append(img));
				
				$(gallery).append(li);
				
				if(tipe=='images')
					$(img).click(function () {
						mmedia.insertImage(from, value);
					});
			});
			
			var page_box	= $('<br><div/>').addClass('pagination').css({clear: 'both'});
			var page_ul		= $('<ul/>').addClass('pagination pagination-sm');
			$(page_box).append(page_ul);
			
			var num_page	= data.pages.numpages;
			var current		= data.pages.page;
			
			for (var i = 1; i <= num_page; i++) {
				var selected = '';
				if(parseInt(i) == parseInt(current))
					var selected = 'selected';
				
				var page_li = $('<li/>').addClass(selected);
				var ahref = $('<a/>').html(i).addClass("thepage");
				
				$(page_ul).append(page_li.append(ahref));
			}
						
			$('.modal-body').append(gallery).append(page_box);
			
			// Temporary, belum tau loop nya kenapa numpuk
			mmedia.tipe = tipe;
			mmedia.from = from;
			mmedia.listenpage();
			
		},
		listenpage : function (){
			var tipe = mmedia.tipe;
			var from = mmedia.from;
			
			$('.thepage').each(function (index, that){
				$(that).click(function() {
					mmedia.getData(tipe, from, $(this).html());
				});
			});
		},
		filelist : function (tipe, from, data) {
			mmedia.resize();
			var polhead = mmedia.polhead(tipe);
			$('.modal-body').append(polhead);
			
			var gallery  = $('<ul/>').addClass('gallery');
			$(data.images).each(function (index, value) {
				if(value.type == 'application/pdf')
					var sr_img = BASEURL+'media/image/icon_pdf.png';
				else if(value.type == 'application/vnd.openxmlformats-officedocument')
					var sr_img = BASEURL+'media/image/icon_word.png';
				else if(value.type == 'application/msword')
					var sr_img = BASEURL+'media/image/icon_word.png';
				else
					sr_img = BASEURL+'media/image/icon-album.png';
				
				var img	= $('<img/>').attr({src:sr_img});
				var crop = $('<div/>').addClass('crop');
				var dixtext = $('<div/>').addClass('divtext').html(value.name);
				var li = $('<li/>').append(crop.append(img)).append(dixtext);
				
				$(gallery).append(li);
				
				if(tipe=='files')
					$(img).click(function () {
						mmedia.insertFile(from, value, sr_img);
					});
			});
			
			var page_box	= $('<br><div/>').addClass('pagination').css({clear: 'both'});
			var page_ul		= $('<ul/>').addClass('pagination pagination-sm');
			$(page_box).append(page_ul);
			
			var num_page	= data.pages.numpages;
			var current		= data.pages.page;
			
			for (var i = 1; i <= num_page; i++) {
				var selected = '';
				if(parseInt(i) == parseInt(current))
					var selected = 'selected';
				
				var page_li = $('<li/>').addClass(selected);
				var ahref = $('<a/>').html(i).addClass("thepage");
				
				$(page_ul).append(page_li.append(ahref));
			}
						
			$('.modal-body').append(gallery).append(page_box);
                        
			mmedia.tipe = tipe;
			mmedia.from = from;
			mmedia.listenpage();
		},
		polhead : function (selected) {
			var dcenter	= $('<div/>').addClass('dcenter');
			var nav		= $('<ul/>').addClass('nav nav-pills popmenu');
			var a_images= $('<a/>').html('Images').click(function () {
				mmedia.goImages();
				return false;
			});			
			var a_album	= $('<a/>').html('Album').click(function () {
				mmedia.goAlbum();
				return false;
			});
			var a_upload=$('<a/>').html('Upload').click(function(){
				mmedia.goUpload();
				return false;
			});
			var a_files=$('<a/>').html('Files').click(function(){
				mmedia.goFiles();
				return false;
			});
			
			
			var images	= $('<li/>').append(a_images);
			var album	= $('<li/>').append(a_album);
			var upload	= $('<li/>').append(a_upload);
			var thefiles    = $('<li/>').append(a_files);
			
			if(selected == 'images')
				$(images).addClass('disabled');
			else if(selected == 'album')
				$(album).addClass('disabled');
			else if(selected == 'upload')
				$(upload).addClass('disabled');
			else if(selected == 'files')
				$(thefiles).addClass('disabled');
			
			$(nav).append(images).append(album).append(upload).append(thefiles);
			$(dcenter).append(nav);
			
			return dcenter;
		},
		goImages : function () {
			mmedia.getData('images', mmedia.tfrom, 1);
		},
		goAlbum : function () {
			mmedia.getData('album', mmedia.tfrom, 1);
		},
		goUpload : function () {
			mmedia.formUpload('upload');
		},
		goFiles : function () {
			mmedia.getData('files', mmedia.tfrom, 1);
		},
		formUpload : function (tipe) {
			$('.modal-body').html('');
			
			var polhead = mmedia.polhead(tipe);
			$('.modal-body').append(polhead);
			
			var f_table = $('<table/>').attr({width: '100%', height: '80%'}),
			ft_tr		= $('<tr/>').attr({valign: 'middle'}),
			ft_td		= $('<td/>').addClass('').attr({align:'center'});
			var form_u	= $('<form/>').addClass('fu_image')
							.on('submit', function (e) {
								imx.uploadFiles(e);
								e.preventDefault();
							});
			var f_input = $('<div/>').addClass('fileinput fileinput-new').attr({'data-provides':'fileinput'});
			var fthumb	= '<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">'+
					    	'<img data-src="" class="pw_image">'+
						  '</div>';
			var fprev	= '<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>';
			var def		= $('<div/>');
			var inp_file= $('<input/>').attr({type:'file', name:'files'})
							.on('change', function (e) {
								imx.prepareUpload(e);
							});
			var csrf	= $('<input/>').attr({type:'hidden', name:token_name, value:csrf_hash});
			var btn_file= $('<span/>').addClass('btn btn-default btn-file').append('<span class="fileinput-new"><i class="ion-search"></i> Select image</span><span class="fileinput-exists">Change</span>')
										.append(inp_file);
			
			$(def).append(btn_file).append('<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>');
			
			$(f_input).append(fthumb).append(fprev).append(def).append(csrf);
			
			/*var f_input	= '<div class="fileinput fileinput-new" data-provides="fileinput">'+
							'<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">'+
						    '<img data-src="" class="pw_image">'+
						  '</div>'+
						  '<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>'+
						  '<div>'+
						    '<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>'+$('<input/>').attr({type:'file'})+'</span>'+
						    '<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'+
						  '</div>'+
						'</div>';*/
			
			//var btn_upload = '<a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="icon-ok icon-white"></i> Upload</a>';
			var btn_upload = $('<button/>').addClass('btn btn-warning').html('<i class="ion-checkmark icon-white"></i> Upload');
			
			$(form_u).append(f_input).append($('<div/>')).append(btn_upload);
			$(f_table).append(ft_tr.append(ft_td.append(form_u)));
			
			$('.modal-body').append(f_table);
			
			
			mmedia.resize();
		},
		insertImage : function (from, data) {
			if(mmedia.onlylink > 0)
				return mmedia.insertLinkOnly(from, data);
			
			var inputdata = BASEURL+'uploads/'+data.info_ex.file_name;
			if(mmedia.shortpath > 0)
				inputdata = data.info_ex.file_name;
			
			if(from == 'box') {
				if($('.previewTarget').html() == undefined) {
					var thumbnail = $('<div/>').addClass('thumbnail mt10');
					var previewTarget = $('<img/>').addClass('previewTarget').attr({src:BASEURL+'uploads/'+data.info_ex.file_name}).css({width:'200px'});
					var inputGambarCurrent = $('<input/>').attr({type:'hidden',name:'inputGambarCurrent'}).val(inputdata);
					var inputGambarExisting = $('<input/>').attr({type:'hidden',name:'inputGambarExisting'}).val(inputdata);
					
					var box = $('#openmm').closest('.box4');
					$(box).append(thumbnail.append(previewTarget)).append(inputGambarCurrent).append(inputGambarExisting);
				}
				else {
					$('.previewTarget').attr({src:BASEURL+'uploads/'+data.info_ex.file_name}).css({width:'200px'});
//					var img_add = $('<img/>').addClass('previewTarget').attr({src:BASEURL+'uploads/'+data.info_ex.file_name}).css({width:'200px'});
//					$('.previewTarget').closest('.thumbnail').append(img_add);
					$('input[name=inputGambarCurrent]').val(inputdata);
				}
			}
			else if(from == 'tiny') {
				tinyMCE.execCommand('mceInsertContent', false, '<img alt="" width="240px" src="' + BASEURL+'uploads/'+data.info_ex.file_name + '"/>');
			}
			
			/*if($('.tbl_file').html() != 'undefined')
				if(mmedia.ismultiple <= 0)
					$('.tbl_file').remove();*/
			
			$('.close').trigger('click'); // tricky close
			//$('#myModal').remove(); // primary close
		},
		insertFile : function (from, data, sr_img) {
			return mmedia.insertLinkOnly(from, data);
			
			var is_new = 1;
			if($('.tbl_file').html() != 'undefined')
				is_new = 0;
				
			var f_table = $('<table/>').attr({width: '100%'}).addClass('tbl_file'),
			f_tr		= $('<tr/>').attr({valign: 'top'}),
			f_td		= $('<td/>').attr({width: '120px'}).html($('<img/>').attr({src: sr_img, 'style': 'max-width: none !important'}).css({width: '110px', 'max-width':'none !important'})),
			f_tdr		= $('<td/>').attr({align: 'left'});
			
			var rdiv	= $('<div/>'),
			p_tt		= $('<p/>').html(data.type),
			d_tt		= $('<div/>').html(data.info_ex.file_name),
			d_size		= $('<div/>').html(data.info_ex.file_ext),
			a_view		= $('<a/>').html('View').attr({href: BASEURL+"/index.php/gadmin/media_manager/viewapp/"+data.id, target: '__blank'});
			var hid_input = $('<input/>').addClass('hid_input').attr({type: 'hidden', name: 'thefiles[]'}).val(data.id);
			
			var thumbnail = $('.previewTarget').closest('.thumbnail').removeClass('thumbnail');
			
			$(thumbnail).html(f_table);
		
			$(rdiv).append(p_tt).append(d_tt).append(d_size).append(a_view).append(hid_input);
			//$(f_table).append(f_tr.append(f_td).append(f_tdr.append(rdiv)));
			
			//if(is_new <=0)
				$('.tbl_file').html(f_tr.append(f_td).append(f_tdr.append(rdiv)));
			
			
			$('.close').trigger('click'); // tricky close
		},
		insertLinkOnly : function (from, data) {
			if($('.previewTarget').html() == undefined) {
				var thumbnail = $('.thumbnail');
				var previewTarget = $('<a/>').attr({href:BASEURL+'uploads/'+data.info_ex.file_name, target:'__blank'}).html('<strong>'+data.info_ex.file_name+'</strong>');
				var inputGambarCurrent = $('<input/>').attr({type:'hidden',name:'inputGambarCurrent'}).val(data.info_ex.file_name);
				var inputGambarExisting = $('<input/>').attr({type:'hidden',name:'inputGambarExisting'}).val(data.info_ex.file_name);
				
				var box = $('#openmm').closest('.box4');
				$(box).append(thumbnail.append(previewTarget)).append(inputGambarCurrent).append(inputGambarExisting);
			}
			else {
				$('.thumbnail').find('a').attr({href:BASEURL+'uploads/'+data.info_ex.file_name}).html('<strong>'+data.info_ex.file_name+'</strong>');
				$('input[name=inputGambarCurrent]').val(data.info_ex.file_name);
			}
			
			$('.close').trigger('click'); // tricky close
		},
		resize : function () {
			var bwight	= $(window).width();
			var bheight	= $(window).height();
			var beighty	= (parseInt(bwight) * 80) / 100;
			var marlef	= (parseInt(bwight) - beighty)/2;
			
			var heighty	= (parseInt(bheight) * 80) / 100;
			
			$('.modal').css({
				'margin-left' : 0,
				left : marlef+'px'
			})
			.animate({
				width : beighty+'px',
				height : heighty+'px'
			}, 500);
			
			//$('.modal-footer').css({height: '24px', padding: 0})
			$('.modal-footer').remove();
			
			var attmod = parseInt($('.modal-header').height());// + 24;
			$('.modal-body');
			
		},
		whiteBg : function (){
			$('.modal-backdrop').css({
				'background-color' : '#FFF'
			});
		}
	}
	
	$('#openmm').click(function (){
		mmedia.getData('images', 'box', 1);
		return false;
	});
	
	$('#opentiny').click(function (){
		mmedia.getData('images', 'tiny', 1);
		return false;
	});
	
	
	/* Ajax Uploader */
	
	var imx = {
		tester : 'oke',
		files : '',
		prepareUpload : function (event) {
		  files = event.target.files;
		},
		uploadFiles : function (event) {
			event.stopPropagation(); // Stop stuff happeninguploadFiles
			 event.preventDefault(); // Totally stop stuff happening

			 // START A LOADING SPINNER HERE

			 // Create a formdata object and add the files
			var data = new FormData();
			$.each(files, function(key, value) {
				data.append('files', value);
			});
			
			data.append(token_name, csrf_hash);
			
			 $.ajax({
			     url: BASEURL+'index.php/gadmin/media_manager/uploadAjax?files',
			     type: 'POST',
			     data: data,
			     cache: false,
			     dataType: 'json',
			     processData: false, // Don't process the files
			     contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			     success: function(data, textStatus, jqXHR)
			     {
			     	if(typeof data.error === 'undefined')
			     	{
			     		// Success so call function to process the form
			     		//submitForm(event, data);
			     		//imx.successUpload();
                                        mmedia.goImages();
                                        return false;
			     	}
			     	else
			     	{
			     		// Handle errors here
			     		console.log('ERRORS: ' + data.error);
			     		alert('ERRORS: ' + data.error);
			     	}
			     },
			     error: function(jqXHR, textStatus, errorThrown)
			     {
			     	// Handle errors here
			     	console.log('ERRORS: ' + textStatus);
			     	alert('ERRORS: ' + textStatus);
			     	// STOP LOADING SPINNER
			     }
			 });
		},
		successUpload : function () {
			alert('foto successfully uploaded');
		},
		submitForm : function (event, data) {
			// Create a jQuery object from the form
			$form = $(event.target);
			
			// Serialize the form data
			var formData = $form.serialize();
			
			// You should sterilise the file names
			$.each(data.files, function(key, value)
			{
				formData = formData + '&filenames[]=' + value;
			});
			
			$.ajax({
				url: BASEURL+'index.php/gadmin/media_manager/uploadAjax',
		        type: 'POST',
		        data: formData,
		        cache: false,
		        dataType: 'json',
		        success: function(data, textStatus, jqXHR)
		        {
		        	if(typeof data.error === 'undefined')
		        	{
		        		// Success so call function to process the form
		        		console.log('SUCCESS: ' + data.success);
		        	}
		        	else
		        	{
		        		// Handle errors here
		        		console.log('ERRORS: ' + data.error);
		        		alert('ERRORS: ' + data.error);
		        	}
		        },
		        error: function(jqXHR, textStatus, errorThrown)
		        {
		        	// Handle errors here
		        	console.log('ERRORS: ' + textStatus);
		        	alert('ERRORS: ' + textStatus);
		        },
		        complete: function()
		        {
		        	// STOP LOADING SPINNER
		        }
			});
		}
	};

});
