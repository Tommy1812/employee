<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: https://tommyemployeesmanagement.herokuapp.com/login.php");
    }
    $username = $_SESSION["username"];
    if(isset($_GET["id"])){
        $id       = $_GET["id"];
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://209.97.173.188:8081/EmployeesManagement/rest/EmployeesManagement/Admin/DeleteEmployee/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded')); // In Java: @Consumes(MediaType.APPLICATION_FORM_URLENCODED)

    //$data = array('username'=>$_SESSION['username']);
    $data = array('ID'=> $_GET["id"]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    if($output == 'true'){
        header("Location: https://tommyemployeesmanagement.herokuapp.com/Admin/EmployeeManagement.php");
    }  
?>