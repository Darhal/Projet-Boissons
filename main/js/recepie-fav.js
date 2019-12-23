function AddToFav(element)
{
    if (!element.textContent.includes("Element Added")){
      console.log(element.textContent);
      var recepie_id = element.getAttribute("value");
      $.post("Backend/func_recepie_fav.php", {recepie_id: recepie_id}, 
        function(data){
          $("#add-fav-btn").text("Element Added");
          $("#fav-receipes").text(data);
        }
      );
    }
}