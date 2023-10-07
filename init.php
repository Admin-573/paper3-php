<?php
    
    $host='127.0.0.1';
    $user='root';
    $password='';
    $databasename='lib';

    $book='book';
    $bid='bid';
    $btitle='btitle';
    $bauthor='bauthor';
    $bprice='bprice';

    $con = mysqli_connect($host,$user,$password,$databasename);
    if(!$con){
        mysqli_connect_error();
    } else {
        //echo "Connected";
    }

?>