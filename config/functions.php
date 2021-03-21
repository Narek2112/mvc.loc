<?php
function show_validation_errors( $errors)
{
   $message =  '';
   foreach ($errors as $error) {
       $message.= "<span class='text-danger d-block'>$error</span>";
   }
   return $message;
}

function url( string $endpoint)
{
    return BASE_URL.$endpoint;
    var_dump($endpoint);die;
}
function flash($message)
{
    $_SESSION['flash'][] = $message;
}
function show_flash_message()
{

    $messages = $_SESSION['flash'] ?? [];

    $msg = '';
    foreach ($messages as $message)
    {
        $msg.="<div class='text-center ".$message['class']."'>".$message['message']."</div>";
    }


    unset($_SESSION['flash']);
    return $msg == '' ? null : $msg;
}

function old(string $key)
{

    if (isset($_SESSION['old'])){

        $message =  $_SESSION['old'][$key] ?? null;
    }
    unset($_SESSION['old'][$key]);

    return $message;
}
function abort($message)
{
    header("HTTP/1.1 404 Not Found");
    echo "<h1 class='text-danger'>$message</h1>";
    exit();
}