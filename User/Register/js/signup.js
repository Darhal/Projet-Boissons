function SubmitSignupData()
{
    var signup_info = $("#signup-form").serialize();
    $.post($("#signup-form").attr('action'), signup_info, 
      function(data){
          $("#results").html(data);
        }
    );
}