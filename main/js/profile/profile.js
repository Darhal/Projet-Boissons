function OnSaveInfo()
{
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var adress = document.getElementById("adress").value;
    var phone = document.getElementById("phone").value;
    var birthdate = document.getElementById("birthdate").value;

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        $.post($("#catselect").attr('action'), {
            username: username, email: email, name: name, last_name: last_name,
            adress: adress, phone: phone, birthdate: birthdate
        }, 
          function(data){
                $("#feedback").html(data);
                $("#feedback").css('color', 'green');
            }
        );
    }else{
        $("#feedback").html("E-mail adress is incorrect!");
        $("#feedback").css('color', 'red');
    }

}