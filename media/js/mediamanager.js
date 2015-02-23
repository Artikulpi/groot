$(document).ready(function(){
	var media = {
		hover : function (){
			$('.imgs').mouseover(function (){
				$(this).find('.img-info').css({top: '0px'});
				$(this).find('.imgaction').show();
			});
			
			$('.zoomin').click(function (){
				var img = $(this).find('input').val();
				var img_info = $(this).closest('.imgs').find('.info-news').html();
				var img_src = $(this).closest('.imgs').find('img').attr('src');
				
				$('#img_title').html(img_info);
				$('.modal-body').html($('<img/>').attr({'src':img_src}));
				
				$('#myModal').modal();
				
				$('#myModal').on('hidden.bs.modal', function () {
					$('#img_title').html('Untitled');
					$('.modal-body').html('Gagal load gambar');
				});
			});
			
			
			$('.imgs').mouseout(function(){
				$(this).find('.img-info').css({top: 'auto'});
				$(this).find('.imgaction').hide();
			});
		}
	}
	
	media.hover();
	
});