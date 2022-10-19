<?php
    $name = @$_POST["name"];
    $email = @$_POST["email"];
    $pswd = @$_POST["password"];
    $qualify = @$_POST["qualify"];
    $upload = @$_POST["upload"];
    
    $imagename =basename($_FILES['upload']['name']);
    $imagepath =$_FILES['upload']['tmp_name'];
    $imageerror =$_FILES['upload']['error'];

    $link = mysqli_connect('localhost','root','','demo');

    if($imageerror == 0){

        $destfile ='image'.$imagename;

        move_uploaded_file($imagepath,$destfile);

        $q="INSERT INTO `reg` values(null,'$name','$email','$pswd','$qualify','$imagename')";
        $res = mysqli_query($link , $q);

        if($res){
            echo "Successful";
        }
        else{
            echo "NotSuccessful";
        }
    }
?>