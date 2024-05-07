<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if(isset($_GET['add'])){
  if (isset($_POST['submit'])) {
    //memanggil add
    $members->add($_POST);
  } else{
    $members->addView();
  }
} else if (!empty($_GET['id_edit'])) {
  //memanggil add
  $id = $_GET['id_edit'];
  if (isset($_POST['submit'])) {
    $members->edit($id, $_POST);
  } else{
    $members->editView($id);
  }
} 
else if (!empty($_GET['id_hapus'])) {
  //memanggil add
  $id = $_GET['id_hapus'];
  $members->delete($id);
} else{  
  $members->index();
}
