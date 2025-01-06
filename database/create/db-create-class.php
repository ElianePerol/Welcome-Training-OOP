<?php

if (count($_POST) > 0) {

    $class_name = $_POST['class_name'];
    
    if (!empty($class_name)) {
        $class = new CreateClass($pdo);
        $class->createClass($class_name);

    } else {
        echo "<script>alert('Le nom de la classe ne peut pas être vide.');</script>";
    }
}
?>
