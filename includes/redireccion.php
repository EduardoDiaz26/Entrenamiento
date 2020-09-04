<?php

if(!isset($_SESSION['identidad']['usuario'])){
    header("Location: ./login.html");
}