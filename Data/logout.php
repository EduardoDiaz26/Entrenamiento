<?php
session_start();
    if(isset($_SESSION['identidad'])){
        
        unset($_SESSION['identidad']);
    } 
   
    header("Location:../login.html");


