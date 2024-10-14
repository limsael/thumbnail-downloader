const urlField = document.querySelector(".field input"),
  previewArea = document.querySelector(".preview-area"),
  imgTag = previewArea.querySelector(".thumbnail"),
  hiddenInput = document.querySelector(".hidden-input");

urlField.addEventListener("keyup", () => {
  let imgUrl = urlField.value; // getting user entered value
  previewArea.classList.add("active");

  if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
    // if it's a youtube video

    let vidId = imgUrl.split("v=")[1].substring(0, 11); // splitting youtube video url from v= so we can only get video id
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; // This is a yt thumb url

    imgTag.src = ytThumbUrl; // passing yt thumbnail into src attribute
  } else if (imgUrl.indexOf("https://youtu.be") != -1) {
    // if it's a youtube

    let vidId = imgUrl.split("be/")[1].substring(0, 11); // splitting youtube video url from v= so we can only get video id
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; // This is a yt thumb url

    imgTag.src = ytThumbUrl; // passing yt thumbnail into src attribute
  } else if (imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)) {
    // if entered value is other than youtube video
    imgTag.src = imgUrl; // passing the entered value as the image source
  } else {
    imgTag.src = "";
    previewArea.classList.remove("active"); // removing active class if entered value is not a valid url
  }

  hiddenInput.value = imgTag.src; // passing the image source into hidden input field
});
