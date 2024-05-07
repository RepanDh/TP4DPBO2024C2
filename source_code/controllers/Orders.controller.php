<?php
include_once("conf.php");
include_once("models/Orders.class.php");
include_once("models/Members.class.php");
include_once("views/Orders.view.php");
include_once("views/TambahOrders.view.php");
include_once("views/EditOrders.view.php");

class OrdersController{
    private $orders;
    private $members;

    function __construct(){
        $this->orders = new Orders(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->orders->open();
        $this->orders->getOrdersJoin();
        $data = array();
        while($row = $this->orders->getResult()){
            array_push($data, $row);
        }
        $this->orders->close();

        $view = new OrdersView();
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

        $view = new TambahOrdersView();
        $view->render($data);
    }

    public function editView($id) {
        $this->orders->open();
        $this->members->open();

        $this->orders->getOrdersById($id);
        $this->members->getMembers();

        $data = array(
            'order' => $this->orders->getResult(),
            'members' => array()
        );

        while($row = $this->members->getResult()){
            array_push($data['members'], $row);
        }

        $this->orders->close();
        $this->members->close();

        $view = new EditOrdersView();
        $view->render($data);
    }

    function add($data){
        $this->orders->open();
        $this->orders->add($data);
        $this->orders->close();
        
        header("location:index.php");
    }
    
    function edit($id, $data){
        $this->orders->open();
        $this->orders->update($id, $data);
        $this->orders->close();
    
        header("location:index.php");
    }
    
    function delete($id){
        $this->orders->open();
        $this->orders->delete($id);
        $this->orders->close();
    
        header("location:index.php");
    }
}
?>
