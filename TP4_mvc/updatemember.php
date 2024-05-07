<?php
include("models/Template.class.php");
include("models/DB.class.php");
include("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['update'])) {
    $member->updatedata($_POST);
} 
else {
    $member->update($_GET['update']);
}