<?php
include_once("conf.php");
include_once("models/Addresses.class.php");
include_once("models/Members.class.php");
include_once("views/Addresses.view.php");
include_once("views/TambahAddresses.view.php");
include_once("views/EditAddresses.view.php");

class AddressesController{
    private $addresses;
    private $members;

    function __construct(){
        $this->addresses = new Addresses(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->addresses->open();
        $this->addresses->getAddressesJoin();
        $data = array();
        while($row = $this->addresses->getResult()){
            array_push($data, $row);
        }
        $this->addresses->close();

        $view = new AddressesView();
        $view->render($data);
    }

    public function addView() {
        $this->members->open();
        $this->members->getMembers();
        $data = array();
        while($row = $this->members->getResult()){
            array_push($data, $row);
        }
        $this->members->close();

        $view = new TambahAddressesView();
        $view->render($data);
    }

    public function editView($id) {
        $this->addresses->open();
        $this->members->open();

        $this->addresses->getAddressesById($id);
        $this->members->getMembers();

        $data = array(
            'address' => $this->addresses->getResult(),
            'members' => array()
        );

        while($row = $this->members->getResult()){
            array_push($data['members'], $row);
        }

        $this->addresses->close();
        $this->members->close();

        $view = new EditAddressesView();
        $view->render($data);
    }

    function add($data){
        $this->addresses->open();
        $this->addresses->add($data);
        $this->addresses->close();
        
        header("location:index.php");
    }
    
    function edit($id, $data){
        $this->addresses->open();
        $this->addresses->update($id, $data);
        $this->addresses->close();
    
        header("location:index.php");
    }
    
    function delete($id){
        $this->addresses->open();
        $this->addresses->delete($id);
        $this->addresses->close();
    
        header("location:index.php");
    }
}
?>
