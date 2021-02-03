<?php
session_start();
$name="";
$email="";
$subject="";
$message="";
$update = false;
$id = 0;
$errors = array();
//CONNECT TO DATABASE
$db = mysqli_connect('localhost','root','','popup');
//IF SUBMIT BUTTON IS CLICKED
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

//IF ANYTHING IS NOT FILLED
if(empty($name)){
    array_push('name is required');
}
if(empty($email)){
    array_push('email is required');
}
if(empty($subject)){
    array_push('subject is required');
}
if(empty($message)){
    array_push('message is required');
}
//IF THERE IS NO ERROR
if(count($errors)==0){
    $sql = "INSERT INTO save(name,email,subject,message)
        VALUES ('$name','$email','$subject','$message')";
        mysqli_query($db,$sql);

        $result = mysqli_query($db,"SELECT * FROM save");
}
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $db->query("DELETE FROM save WHERE id=$id");
    header("location: index.php");
}
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = mysqli_query($db,"SELECT * FROM save WHERE id =$id");
    $update = true;
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $email = $row['email'];
        $subject = $row['subject'];
        $message = $row['message'];
        //header("location: index.php");
    
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $db->query("UPDATE save SET name='$name', email='$email', subject='$subject', message='$message' WHERE id=$id");
    header("location: index.php");
}
?>
