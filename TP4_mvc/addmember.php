<?php
include("models/Template.class.php");
include("models/DB.class.php");
include("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['tambah'])) {
    $member->adddata($_POST);
}
else {
    $member->add();
}