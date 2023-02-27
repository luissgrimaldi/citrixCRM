<?php
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    if(isset($_POST['buscarTipo']))
    {
        $arr = $_POST['buscarTipo'];
        //$arr = implode(", ", $arr);
        //echo explode(", " , $arr);

        //$query = $connect-> prepare ("UPDATE wp_consultas SET tipos_propiedad= ? WHERE id= 670");
        //$query->execute([$arr]);
        $query = $connect-> prepare("SELECT * from wp_consultas WHERE id= 670");
        $query->execute();
        $list_zonas = $query->fetchAll();                         
    foreach($list_zonas as $zona){                
        $editarNombreZona = $zona['tipos_propiedad'];       	
        $editarNombreZona=explode ( "," , $editarNombreZona);
        foreach($editarNombreZona as $zon1a){ 
        ?>
        <input class="form__checkbox content__checkbox" type="text" name="buscarTipo[]" value="<?php echo $zon1a?>"><?php
        }; }
    }else{
        '<script>alert("Debes seleccionar al menos un evento para finalizarlo"); window.location = "../index.php"</script>';
    }

}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}
?>