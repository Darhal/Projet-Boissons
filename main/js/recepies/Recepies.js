var hierarchy = document.getElementById("hierarchy");

hierarchy.addEventListener("click", OnClick);

[].slice.call(document.getElementsByClassName("folder fa-folder-o")).forEach(toggle);

function OnClick(event){
  var elem = event.target;
  if(elem.tagName.toLowerCase() == "span" && elem !== event.currentTarget){
    toggle(elem);
  }
}

function toggle(elem)
{
  var type = elem.classList.contains("folder") ? "folder" : "file";
      if(type == "file"){
          ShowRecette(elem.value);
      }else if(type=="folder") {
          var isexpanded = elem.dataset.isexpanded == "true";

          if(isexpanded)
          {
              elem.classList.remove("fa-folder-o");
              elem.classList.add("fa-folder");
          }else{
              elem.classList.remove("fa-folder");
              elem.classList.add("fa-folder-o");
          }
          elem.dataset.isexpanded = !isexpanded;

          var toggleelems = [].slice.call(elem.parentElement.children);
          var classnames = "file,foldercontainer,noitems".split(",");

          toggleelems.forEach(function(element){
              if(classnames.some(function(val){return element.classList.contains(val);}))
              element.style.display = isexpanded ? "none" : "block";
          });
      }
}

function ShowRecette(aliment)
{
  console.log(Recettes);
}