<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Addresses.controller.php");

$address = new AddressesController();

if(isset($_GET['add'])){
  if (isset($_POST['submit'])) {
    //memanggil add
    $address->add($_POST);
  } else{
    $address->addView();
  }
} else if (!empty($_GET['id_edit'])) {
  //memanggil add
  $id = $_GET['id_edit'];
  if (isset($_POST['submit'])) {
    $address->edit($id, $_POST);
  } else{
    $address->editView($id);
  }
} 
else if (!empty($_GET['id_hapus'])) {
  //memanggil add
  $id = $_GET['id_hapus'];
  $address->delete($id);
} else{  
  $address->index();
}
