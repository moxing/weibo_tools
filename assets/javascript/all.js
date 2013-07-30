$(function() {
    $('.admin').click(function() {
    	var d=$(this).attr('data-url');
    	$('#a-content').load("ajax.php?do="+d);
    });
});