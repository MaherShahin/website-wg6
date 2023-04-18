// on clicking the image enlarge the image to original size, then if you click again it will go back to normal size, works on phone also
var img = document.getElementsByTagName("img");
for (var i = 0; i < img.length; i++) {
  img[i].addEventListener("click", function () {
    if (this.style.width == "100%") {
      this.style.width = "10%";
    } else {
      this.style.width = "100%";
    }
  });
}
