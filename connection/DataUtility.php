<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DataUtility {

    public function DML($sql) {
        
        $result = "";
       // $con = new mysqli("127.0.0.1", "root", "123", "shopingsite");
        $con = new mysqli("localhost", "root", "", "shopingsite");
        if ($con->connect_error) {
            $result = "Error " . $con->connect_error;
        } else {
            if ($con->query($sql) == TRUE) {
                $result = "Save successfully";
            } else {
                $result = "Not Saved successfully".$sql;
            }
        }
        return $result;
    }

    public function DQL($sql) {
        $result = "";
        $con = new mysqli("localhost", "root", "", "ShopingSite");
        if ($con->connect_error) {
            $result = "Error " . $con->connect_error;
        } else {
           $result=$con->query($sql); 
        }
        return $result;
    }
    
     
      
}
