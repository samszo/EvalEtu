$(function(){
    $(".tdC").click(function(){
        var id = $(this).attr('id');
		var name = $(this).attr('name');
		var data = document.getElementById(id);
		var prof = data.getAttribute('prof'); 
		var date = data.getAttribute('date');
		
      $.post('Liste_Etudiants.php', {id:id, name:name,prof:prof, date:date }, function(data){
			 $("#studentsInfo").html(data).fadeIn(1000);
	  
	  });
    });
});


