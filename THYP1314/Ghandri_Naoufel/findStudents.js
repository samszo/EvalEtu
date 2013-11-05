$(function(){
    $(".tdC").click(function(){
        var id = $(this).attr('id');
		var name = $(this).attr('name');
		
      $.post('afficher.php', {id:id, name:name}, function(data){
			 $("#studentsInfo").html(data).fadeIn(2000);
	  
	  });
    });
});


