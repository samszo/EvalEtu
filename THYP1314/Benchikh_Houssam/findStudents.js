

    function setcours(lib) {
        $.ajax({
                type:"GET",
                url:"Image.php",
                data: {data:lib},
                success:function(server_response){
                    $("#studentsInfo").html(server_response).fadeIn(2000);
                }
        });
}
//Call AJAX:
$(document).ready(setcours(lib));