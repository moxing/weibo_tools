$('#add_teacher').click(function() {
	var name = $('#inputName').val();
	var school  = $('#inputSchool').val();
	var desc = $('#inputRecord').val();
	$.post("ajax.php?do=teacher", { name: name ,school:school,desc:desc,op:'add'},
	  function(data){
	  	if(data.id){
	  		$('.table tbody').prepend("<tr><td>"+data.name+"</td><td>"+data.ori_pwd+"</td><td>"+data.school+"</td><td></td><td></td></tr>");
	  		$('#teacherModal').modal('hide')
	  	}
	  }, "json");
});