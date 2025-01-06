<?php

if (count($_POST) > 0) {

    $subject_name = $_POST['subject_name'];
    
    if (!empty($subject_name)) {
        $subject = new CreateSubject($pdo);
        $subject->createSubject($subject_name);

    } else {
        echo "<script>alert('Le nom de la matière ne peut pas être vide.');</script>";
    }
}
?>
