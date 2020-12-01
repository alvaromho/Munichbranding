<?php


    date_default_timezone_set('UTC');
    $post_data = $_POST['evento'];
    $filename ='munich_'.date('m-Y').'.txt';
    //$handle = fopen($filename, "w");      
    if (empty($post_data)) {   
        //fwrite($handle, ' Error de  registro en log:  '. $post_data);
        // Escribe el contenido al fichero
        // Escribir los contenidos en el fichero,
        file_put_contents($filename, 'Error de  registro en log '.date('m-d-Y_h:i:a').': '. preg_replace("/\s+/", "", $post_data)."\n", FILE_APPEND | LOCK_EX);  
    }
    if (!empty($post_data)) {
        //fwrite($handle, 'Error');
        //fwrite($handle, $post_data );
        file_put_contents($filename, 'Error_'.date('m-d-Y_h:i:a').': '. preg_replace("/\s+/", "", $post_data)."\n", FILE_APPEND | LOCK_EX);  

    }
     //fclose($handle);

?>