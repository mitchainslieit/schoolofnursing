<?php
    if (isset($_POST['file_name'])) {
        $file = $_POST['file_name'];
        header('Content-type: application/msword');
        header('Content-Disposition: attachment; filename="'.$file.'"');
        readfile('../cv/'.$file);
        exit();
    }
?>