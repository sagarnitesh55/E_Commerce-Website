<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './connection/DataUtility.php';
$pid=$_GET['pid'];
$sql = "select photo from product where pid='$pid'";
$ob = new DataUtility();
$result = $ob->DQL($sql);
if ($result == false)
    die("Not Find");

if ($row = $result->fetch_assoc()) {
   
   
    echo $row['photo'];
}

