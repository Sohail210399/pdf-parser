<?php
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        include 'vendor/autoload.php';
        $parser = new \Smalot\PdfParser\Parser();
        
           // $file=$_FILES['file'];
            if(filesize($target_file)>0){
            $pdf    = $parser->parseFile($target_file);
            $text = $pdf->getText();
            }
            else
            {
            
            header('Location:index.php');
            
            }  
        
?>