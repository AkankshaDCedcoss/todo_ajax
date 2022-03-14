<?php
session_start();
if(!isset( $_SESSION['todo'])){
    $_SESSION['todo'] = array();
}
if(!isset( $_SESSION['complete'])){
    $_SESSION['complete'] = array();
}
?>
<?php
if(isset($_POST['action']) && $_POST['action']=='todo'){
        array_push( $_SESSION['todo'] ,$_POST['todo']);

        echo json_encode($_SESSION['todo']);
}
if(isset($_POST['action']) && $_POST['action']=='edit'){
    array_splice($_SESSION['todo'],$_POST['edit'],1,$_POST['u_value']);
       echo json_encode($_SESSION['todo']);
}
if(isset($_POST['action']) && $_POST['action']=='delete'){
    $a = $_POST['delete'];
    array_splice($_SESSION['todo'],$_POST['delete'],1);
       echo json_encode($_SESSION['todo']);
}
if(isset($_POST['action']) && $_POST['action']=='check'){
    array_splice($_SESSION['todo'],$_POST['delete'],1);
    array_push($_SESSION['complete'] ,$_POST['complete']);
       echo json_encode($_SESSION['complete']);
}

?>