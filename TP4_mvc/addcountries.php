<?php
include("models/Template.class.php");
include("models/DB.class.php");
include("controllers/Countries.controller.php");

$Countries = new CountriesController();

if (isset($_POST['tambah'])) {
    $Countries->adddata($_POST);
}
else {
    $Countries->add();
}