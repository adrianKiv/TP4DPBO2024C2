<?php
include_once("connection.php");
include_once("models/Countries.class.php");
include_once("view/Countries.view.php");

class CountriesController {
  private $countries;
  private $view;

  function __construct(){
    $this->countries = new Countries(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    $this->view = new CountriesView();
  }

  public function index() {
    $this->countries->open();
    $this->countries->getcountries();

    $data = array();
    
    while($row = $this->countries->getResult()){
      array_push($data, $row);
    }
    
    $this->countries->close();

    $this->view->rendercountries($data);
  }
  
  public function add() {
    $this->view->renderadd();
  }
  
  public function update($id) {
    $this->countries->open();
    $this->countries->getcountriesById($id);
    $data = $this->countries->getResult();
    $this->countries->close();
    $this->view->renderupdate($data);
  }
  
  function adddata($data){
    $this->countries->open();
    $this->countries->addcountries($data);
    $this->countries->close();
    
    header("location:countries.php");
  }

  function updatedata($id){
    $this->countries->open();
    $this->countries->updatecountries($id);
    $this->countries->close();
    
    header("location:countries.php");
  }

  function deletedata($id){
    $this->countries->open();
    $this->countries->deletecountries($id);
    $this->countries->close();
    
    header("location:countries.php");
  }
}