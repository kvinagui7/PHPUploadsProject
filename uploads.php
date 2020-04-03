<?php
if(isset($POST['submit'])){
  $file= $_FILES['file'];

  $fileName = $FILES['file']['name'];
  $fileTmpName = $FILES['file']['tmp_name'];
  $fileSize = $FILES['file']['size'];
  $fileError = $FILES['file']['error'];
  $fileType = $FILES['file']['type'];

  $fileExt = explode ('.',$fileName);
  $fileActualExt= strtolower(end($fileExt));
  $allowed = array('jpg');

  if (in_array($fileActualExt, $alllowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000) {
        $fileNameNew = uniqid('', true).'.'.$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        header("Location: index.php?uploadsuccess");
      }
      else {
        echo "Your file is too big!";
      }
    }
    else {
      echo "There was an error uploading your file";
    }
  } else {
    echo "You can not upload files of this type!";
  }

}
