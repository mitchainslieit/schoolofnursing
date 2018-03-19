<?php
    if (isset($_POST['file_name'])) {
        $file = $_POST['file_name'];
        shell_exec('start /wait soffice --headless --convert-to pdf --outdir "./pdf" "./'.$file.'.doc');
        header("location: pdf/$file.pdf");
    }
?>