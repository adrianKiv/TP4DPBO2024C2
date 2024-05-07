<?php
include_once("connection.php");
include_once("models/Member.class.php");
include_once("models/Countries.class.php");
include_once("view/Member.view.php");

class MemberController {
  private $member;
  private $countries;
  private $view;

  function __construct(){
    $this->member = new Member(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    $this->countries = new Countries(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    $this->view = new MemberView();
  }

  public function index() {
    $this->member->open();
    $this->member->getmemberJoin();

    $data = array();
    
    while($row = $this->member->getResult()){
      array_push($data, $row);
    }
    
    $this->member->close();

    $this->view->rendermember($data);
  }
  
  public function add() {
    $this->countries->open();
    $this->countries->getcountries();

    $datacountries = array();
    
    while($row = $this->countries->getResult()){
      array_push($datacountries, $row);
    }
    
    $this->countries->close();
    $this->view->renderadd($datacountries);
  }
  
  public function update($id) {
    $this->countries->open();
    $this->member->open();

    $this->member->getMemberById($id);
    $data = $this->member->getResult();
    
    $this->countries->getcountries();
    $data['countries'] = array();
    while($row = $this->countries->getResult()){
      array_push($data['countries'], $row);
    }

    $this->countries->close();
    $this->member->close();
    $this->view->renderupdate($data);
  }
  
  function adddata($data){
    $this->member->open();
    $this->member->addmember($data);
    $this->member->close();
    
    header("location:index.php");
  }

  function updatedata($id){
    $this->member->open();
    $this->member->updatemember($id);
    $this->member->close();
    
    header("location:index.php");
  }

  function deletedata($id){
    $this->member->open();
    $this->member->deletemember($id);
    $this->member->close();
    
    header("location:index.php");
  }
}