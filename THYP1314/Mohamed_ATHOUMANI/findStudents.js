$(function(){
    $(".tdC").click(function(){
        var data = "showStudents";
        $.ajax({
                type:"GET",
                url:"showImg.php",
                data:data,
                success:function(server_response){
                    $("#studentsInfo").html(server_response).fadeIn(2000);
                }
        });
    });
});


