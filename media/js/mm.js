var MediaManager = {
	baseurl : '',
    _popup: null,
    popup: function() {
        MediaManager._popup = window.open(BASEURL+'/index.php/gadmin/media_manager/popup', 'popup'
            ,'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
    },
    close: function() {
        MediaManager._popup.close();
        var id = MediaManager.image.id;
        var imgurl = MediaManager.image.source;
        
        $('input[name=inputGambarExisting]').val(imgurl);
        $('.thumbnail').find('img').attr({src:imgurl});
    },
    image: {}
}
