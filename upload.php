<?php

// Comprobar si se han enviado archivos
if (isset($_FILES['files'])) {
    // Carpeta en la que se van a guardar los archivos
    $uploadDirectory = 'uploads/';
    
    // Recorrer el array de archivos
    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
        // Obtener el nombre y la ubicación temporal del archivo
        $fileName = $_FILES['files']['name'][$i];
        $fileTmpName = $_FILES['files']['tmp_name'][$i];
        
        // Mover el archivo a la carpeta de destino
        move_uploaded_file($fileTmpName, $uploadDirectory . $fileName);
    }
    
    // Mostrar un mensaje de éxito
}
?>
