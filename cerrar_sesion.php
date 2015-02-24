<?php
session_start();
if(!isset($_SESSION['codigo'])){
        header("Location: index.html");
}
session_destroy();
header("Location: index.html");
?>