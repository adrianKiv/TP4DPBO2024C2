<?php
include("models/Template.class.php");
include("models/DB.class.php");
include("controllers/Countries.controller.php");

$countries = new CountriesController();

if (!empty($_GET['delete'])) {
    $id = $_GET['delete'];
    $countries->deletedata($id);
    header("location:countries.php");
}
else {
    $countries->index();
}