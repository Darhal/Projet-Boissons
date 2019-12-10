function SubmitSignupData()
{
    var signup_info = $("#signup-form").serialize();
    $.post($("#signup-form").attr('action'), signup_info, 
      function(data){
          if (data == "true") {
            window.location.href = '/Projet-Boissons/main/index.php';
          }else{
            $("#results").html(data);
          }
        }
    );
}

function ClickLogin()
{
  window.location.href = '/Projet-Boissons/User/Login/index.html';
}