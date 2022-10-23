<?php 
session_start();
if(!isset($_SESSION['user'])){ //if login in session is not set
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="attachement"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
// connect to the database
// include('admin/conn.php');

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['attachement']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['attachement']['tmp_name'];
    $size = $_FILES['attachement']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['attachement']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
                echo "File uploaded successfully";
        } else {
            echo "Failed to upload file.";
        }
    }
}