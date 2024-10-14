<?php

if (isset($_POST["download"])) {
  $imgUrl = $_POST["hidden-input"];
  $ch = curl_init($imgUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // it transfers data as the return value curl_exec rather than outputting it directly

  $download = curl_exec($ch); // executing curl


  curl_close($ch); // closing curl session

  header('Content-Type: image/jpg'); // setting content type of the header to image/jpg so we can get img in jpg format not in base64 format.

  header('Content-Disposition: attachment; filename="thumbnail.jpg"');
  /*
   * setting content disposition to "attachment" 
   * to indicate browser this file should download with the * same filename.
   */

  echo $download;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thumbnail | Coding nepal</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <header>Download Thumbnail</header>
    <div class="url-input">
      <span class="title"> Paste video url: </span>
      <div class="field">
        <input type="text" name="search" id="search"
          placeholder="https://www.youtube.com/watch?v=FucPPCPDd2Y&list=PLpwngcHZlPaf1aw42OGyitm4jh2Dlmi9c&index=2"
          required />
        <input type="hidden" name="hidden-input" class="hidden-input">
        <div class="bottom-line"></div>
      </div>
    </div>

    <div class="preview-area">
      <img src="" alt="thumbnail" class="thumbnail" />
      <i class="icon fas fa-cloud-download-alt"></i>
      <span>Paste video url to see preview</span>
    </div>

    <button type="submit" name="download" class="download-btn">Download Thumbnail</button>
  </form>

  <script src="script.js"></script>
</body>

</html>