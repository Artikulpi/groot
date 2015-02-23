var medpop = {
	page : 10,
	init : function (start){
		if(typeof(start) == 'undefined')
			start = 1;
		var urlget = BASEURL+'index.php/media_manager/media_manager_admin/listAjax/';
		
		if(start > 0)
			urlget += start+'/';
		
		medpop.createLoader();
		
		$.ajax({
			url			: urlget,
			type		: "GET",
			dataType	:'json',
			beforeSend	: function() {
			},
			success	: function(data){
				//alert(JSON.stringify(data));
				setTimeout(function() {	
					if(data.total_images > 0)
						medpop.listing(data);
					medpop.removeLoader();
				}, 1000);
			},
			error	: function (e) {
				medpop.removeLoader();
			}
		});
	},
	listing : function (data) {
		var poplist = $('#poplist');
		$(poplist).html('');
		
		$(data.images).each(function(index, value){
			var imgs = $('<div/>').addClass('col-md-2 imgs');
			var crop = $('<div/>').addClass('crop img-holder'),
			img_s	 = $('<img />').attr({src:BASEURL+'uploads/'+value.name}).click(function (){medpop.assign(this, value.id)});
			
			$(crop).append(img_s);
			$(poplist).append($(imgs).append(crop));
		});
		
		medpop.createPage($('.pagebox'), data);
	},
	createLoader : function () {
		var loader = medpop.loader();
		$('#poplist').html(loader);
	},
	loader : function () {
		return $('<div/>').addClass('loading').html('<div class="spinner"></div>');
	},
	removeLoader : function () {
		$('#loading').remove();
	},
	assign : function (img, img_id){
		var img_src = $(img).attr('src');
		$('.previewTarget').attr({src:img_src});
		$('input[name=inputGambarExisting]').val(img_src);
		$('input[name=inputGambarExistingId]').val(img_id);
		
		$('.close').trigger('click'); // tricky close
		$('#myModal').remove(); // primary close
	},
	createPage : function(combox, data) {
		var pagination	= $('<div/>').addClass('dk_page');
		var limit		= parseInt(this.limit);
		var pages		= data.pages;
		var p_activ		= pages.page;
		var numpages	= 0;
		
		if(typeof(pages.numpages) == 'number')
			numpages	= pages.numpages;
		
		if(numpages <= 1)
			return false;
		
		var arow		= 5;
		var inrow		= Math.ceil(parseInt(p_activ)/parseInt(arow));
		var totalrow	= Math.ceil(parseInt(numpages)/parseInt(arow))
		
		var minpage	= (parseInt(inrow) * parseInt(arow)) - parseInt(4);
		var maxpage	= (parseInt(inrow) * parseInt(arow));
		
		if(typeof(data.total_images) != 'number') {
			this.log("Page bukan berupa number");
			return false;
		}
		
		var page_first	= '',
		page_prev		= '',
		page_last		= '',
		page_last		= '';
		
		if(inrow > 1) {
			var prevrow	= minpage - 1;
			page_first		= $('<a/>').addClass('pn').attr({href:'#page=1'}).html('First');
			$(page_first).click(function(){medpop.init(parseInt(prevrow)); return false;});
			if(typeof(pages.prev) == 'number') {
				page_prev		= $('<a/>').attr({href:'#page='+parseInt(prevrow)}).html('<<');
				$(page_prev).click(function(){medpop.init(parseInt(prevrow)); return false;});
			}
			$(pagination).append(page_first).append('&nbsp;').append(page_prev).append('&nbsp;');
		}
		
		var p = minpage;
		var limitloop	= maxpage;
		if(maxpage > numpages)
			limitloop = numpages;
		for(var p= minpage; p <= limitloop; p++) {
			if(p == p_activ)
				var page_a	= $('<a/>').addClass('selected').html(p_activ);
			else {
				var np	= p;
				var page_a = $('<a/>').attr({href:'#page='+p, onclick: "medpop.init("+np+"); return false;"}).html(p);
				
			}
			
			$(pagination).append(page_a).append('&nbsp;');
			
		}		
		
		if(totalrow > inrow) {
			var nextrow = maxpage + 1;
			if(typeof(pages.next) == 'number') {
				page_next	= $('<a/>').addClass('page gradient').attr({href:'#page='+parseInt(nextrow)}).html('>>');
				$(page_next).click(function(){medpop.init(parseInt(nextrow)); return false;});
			}
			if(typeof(pages.lastpage) == 'number') {
				page_last	= $('<a/>').addClass('pn').attr({href:'#page='+parseInt(pages.lastpage)}).html('Last');
				$(page_last).click(function(){medpop.init(parseInt(pages.lastpage)); return false;});
			}
			$(pagination).append(page_next).append('&nbsp;').append(page_last).append('&nbsp;');
		}
		
		$(combox).html(pagination);
	}
}
	
	
	
