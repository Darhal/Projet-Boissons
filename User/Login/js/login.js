function SubmitLoginData()
{
    var username = document.getElementById("username").value;
    var pass = document.getElementById("pass").value;
    $.post($("#login-form").attr('action'), {user: username, password: pass}, 
      function(data){
          if (data == "true") {
            window.location.href = '/Projet-Boissons/main/index.php';
          }else{
            $("#results").html(data);
          }
      }
    );
}