<?php

$name = $_FILES['photo']['name'];
$extension = pathinfo($name, PATHINFO_EXTENSION);

if (isset($name)) {
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
        $tmp = $_FILES['photo']['tmp_name'];
        $dir = $_POST['img-folder-name'];

        mkdir($dir);
        move_uploaded_file($tmp, $dir . "/" . $name);
        header('location: index.php?correct=1');
    } else {
        header('location: index.php?incorrect=1');
    }
}
