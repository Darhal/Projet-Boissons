function AddToFav(element)
{
  var recepie_id = element.getAttribute("value");
  if (!element.textContent.includes("Remove From Favourite")){
    $.post("Backend/func_recepie_fav.php", {recepie_id: recepie_id}, 
      function(data){
        console.log(data);
        $("#add-fav-btn").text("Remove From Favourite");
        $("#fav-receipes").text(data);
      }
    );
  }else{
    $.post("Backend/rmv_recepie_fav.php", {recepie_id: recepie_id}, 
      function(data){
        console.log(data);
        $("#add-fav-btn").text("Add Favourite");
        $("#fav-receipes").text(data);
      }
    );
  }
}