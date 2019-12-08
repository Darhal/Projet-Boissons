/*$("#signup-form").submit(function(){
    var signup_info = $(this).serialize();
    console.log(signup_info);
    $.post($(this).attr('action'), signup_info, 
      function(data){
          $("#results").html(data);
        },
      "json"
    );
});*/

function SubmitSignupData()
{
    var signup_info = $("#signup-form").serialize();
    console.log(signup_info);
    $.post($("#signup-form").attr('action'), signup_info, 
      function(data){
          $("#results").html(data);
        }
    );
}