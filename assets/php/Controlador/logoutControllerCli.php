<?php
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if(isset($numDoc) && $rol==3){
    session_destroy();
echo "<script>location.href = '../../../views/index.php';  </script>";
exit();
}
?>