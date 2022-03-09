<?php
session_start();
// session_destroy();


if(!isset($_SESSION['todoComplete']))
{
    $_SESSION['todoComplete']=array();
}





if(isset($_POST))
{
    
    $addtodo=$_POST['addtodo'];
    $action=$_POST['action'];
$key1=$_POST['key1'];
$key2=$_POST['key2'];
$key3=$_POST['key3'];
$key4=$_POST['key4'];
    switch($action)
    {
case 'addData':
{
add($addtodo);
}
break;

case 'complete':
    {
    completeTo($key1);
    }
    break;

    case 'update':
        {
        updateTo($key2,$key3);
        }
        break;

        case 'delete':
            {
            deleteTo($key4);
            }
            break;










    }






}




function add($addtodo){


    if(!isset($_SESSION['todoAjax']))
    {
        $_SESSION['todoAjax']=array();
    }
    
    

    $x=$addtodo;
 
    array_push($_SESSION['todoAjax'],$x);
    echo json_encode($_SESSION['todoAjax']);
    

}



function completeTo($key1)
{

    for($i=0;$i < count($_SESSION['todoAjax']);$i++)
    {
        if($i == $key1)
        {

array_push($_SESSION['todoComplete'],$_SESSION['todoAjax'][$i]);
array_splice($_SESSION['todoAjax'],$i,1);
echo json_encode($_SESSION['todoComplete']);

        }
    }

}


function updateTo($key2,$key3)
{

    for($i=0;$i < count($_SESSION['todoAjax']);$i++)
    {
        if($i == $key2)
        {


array_splice($_SESSION['todoAjax'],$i,1,$key3);
echo json_encode($_SESSION['todoAjax']);

        }
    }



}



function deleteTo($key4)
{


    for($i=0;$i < count($_SESSION['todoAjax']);$i++)
    {
        if($i == $key4)
        {


array_splice($_SESSION['todoAjax'],$i,1);
echo json_encode($_SESSION['todoAjax']);

        }
    }


}
