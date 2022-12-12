function ToggleBar() {
  var sidebar = document.querySelector(".sidebar");
  var main = document.querySelector(".main-content");

  sidebar.classList.toggle("toggleNav");

  if (sidebar.className == "sidebar") {
    main.style.marginLeft = "250px";
  } else {
    main.style.marginLeft = "0px";
  }
}

function closeBtn(e) {
  const alert = document.querySelector(".alert");
  alert.style.display = "none";
}

function previewImg() {
  const cover = document.querySelector("#cover");
  const imgPreview = document.querySelector(".img-preview");

  const fileCover = new FileReader();
  fileCover.readAsDataURL(cover.files[0]);

  fileCover.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}
