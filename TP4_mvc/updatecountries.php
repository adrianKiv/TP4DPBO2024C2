<?php
include("models/Template.class.php");
include("models/DB.class.php");
include("controllers/Countries.controller.php");

$countries = new CountriesController();

if (isset($_POST['update'])) {
    $countries->updatedata($_POST);
} 
else {
    $countries->update($_GET['update']);
}