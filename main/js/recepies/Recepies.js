var hierarchy = document.getElementById("hierarchy");

hierarchy.addEventListener("click", OnClick);

[].slice.call(document.getElementsByClassName("folder fa-folder-o")).forEach(toggle);

function OnClick(event) {
  var elem = event.target;
  if (elem.tagName.toLowerCase() == "span" && elem !== event.currentTarget) {
    toggle(elem);
  }
}

function toggle(elem) {
  var type = elem.classList.contains("folder") ? "folder" : "file";
  if (type == "file") {
    ShowRecette(elem.dataset.data);
  } else if (type == "folder") {
    var isexpanded = elem.dataset.isexpanded == "true";

    if (isexpanded) {
      elem.classList.remove("fa-folder-o");
      elem.classList.add("fa-folder");
      HideRecette();
    } else {
      elem.classList.remove("fa-folder");
      elem.classList.add("fa-folder-o");
      ShowRecette(elem.dataset.data);
    }
    elem.dataset.isexpanded = !isexpanded;

    var toggleelems = [].slice.call(elem.parentElement.children);
    var classnames = "file,foldercontainer,noitems".split(",");

    toggleelems.forEach(function (element) {
      if (classnames.some(function (val) { return element.classList.contains(val); }))
        element.style.display = isexpanded ? "none" : "block";
    });
  }
}

function ShowRecette(aliment) {
  $("#recepies-post").empty();
  if (AlimentToRecette[aliment]) {
    $('#best-receipe-area').css('display', '');
    AlimentToRecette[aliment].forEach(function (element) {
      var rct = Recettes[element];
      var title = rct["titre"];
      img_name = title.toLowerCase();
      img_name = img_name.replace(/\s+/g, '_') + ".jpg";
      img_name = img_name.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
      img_name = img_name.charAt(0).toUpperCase() + img_name.slice(1)
      var img_path = "../Photos/" + img_name;
      $("#recepies-post").append(
        `<div class='col-12 col-sm-6 col-lg-4'>
          <div class='single-best-receipe-area mb-30'>
            <img src='`+ img_path + `' onerror="javascript:this.src='img/bg-img/default.png'">
            <div class='receipe-content'>
                <a href='receipie.php?receipie=`+ element + `'>
                    <h5>`+ title + `</h5>
                </a>
                <div class='ratings'>
                    <i class='fa fa-star' aria-hidden='true'></i>
                    <i class='fa fa-star' aria-hidden='true'></i>
                    <i class='fa fa-star' aria-hidden='true'></i>
                    <i class='fa fa-star' aria-hidden='true'></i>
                    <i class='fa fa-star-o' aria-hidden='true'></i>
                </div>
            </div>
          </div>
        </div>`);
    });
  }
}

function HideRecette() {
  $("#recepies-post").empty();
  $('#best-receipe-area').css('display', 'none');
}
