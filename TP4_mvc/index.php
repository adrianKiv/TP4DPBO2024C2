<?php
include("models/Template.class.php");
include("models/DB.class.php");
include("controllers/Member.controller.php");

$member = new MemberController();

if (!empty($_GET['delete'])) {
    $id = $_GET['delete'];
    $member->deletedata($id);
    header("location:index.php");
}
else {
    $member->index();
}