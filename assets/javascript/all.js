$(function() {
    $('.status-img').click(function() {
    	var pic1=$(this).attr('data-bmiddle-pic');
    	var pic2=$(this).attr('src');
    	$(this).attr('src',pic1);
    	$(this).attr('data-bmiddle-pic',pic2);
    	var d = $(this).parent('.thumbnail');
    	if(d.hasClass('span2')){
    		d.removeClass('span2');
    		d.addClass('span11');
    	}else{
    		d.removeClass('span11');
    		d.addClass('span2');
    	}    	
    });

    $('.add-pw, .add-p, .add-w, .update-w').click(function(){
        if( $(this).parents('.ori-status').get(0)!=undefined ){
            var o = $(this).parents('.ori-status');
        }else{
            var o = $(this).parents('.status');
        }
        $.ajax({
          dataType: "json",
          url: "a.php",
          data: {
            'do' : 'update',
             id   : o.attr('data-status')
          },
          success: function(data){
            console.log(data);
          }
        });
    })

    $('.download-pic').click(function(){
        var dp = $(this);
        if( dp.parents('.ori-status').get(0)!=undefined ){
            var o = dp.parents('.ori-status');
        }else{
            var o = dp.parents('.status');
        }
        $.ajax({
          dataType: "json",
          url: "a.php",
          data: {
            'do' : 'pic',
             id  : o.attr('data-status')
          },
          success: function(data){
            if(data.pic=='success'){
                dp.hide();
            }
          }
        });
    });
});