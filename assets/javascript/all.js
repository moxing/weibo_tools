$(function() {
    $('.status-img').click(function() {
    	var pic1=$(this).attr('data-bmiddle-pic');
    	var pic2=$(this).attr('src');
    	$(this).attr('src',pic1);
    	$(this).attr('data-bmiddle-pic',pic2);
    	var d = $(this).parent('.thumbnail');
    	console.log(d);
    	if(d.hasClass('span2')){
    		d.removeClass('span2');
    		d.addClass('span11');
    	}else{
    		d.removeClass('span11');
    		d.addClass('span2');
    	}    	
    });
});