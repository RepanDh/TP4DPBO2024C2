<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("views/Members.view.php");
include_once("views/TambahMembers.view.php");
include_once("views/EditMembers.view.php");

class MembersController{
    private $members;

    function __construct(){
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->members->open();
        $this->members->getMembers();
        $data = array();
        while($row = $this->members->getResult()){
            array_push($data, $row);
        }
        $this->members->close();

        $view = new MembersView();
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

        $view = new TambahMembersView();
        $view->render($data);
    }

    public function editView($id) {
        $this->members->open();
        $this->members->getMembersById($id);

        $data = array(
            'member' => $this->members->getResult(),
        );

        $this->members->close();

        $view = new EditMembersView();
        $view->render($data);
    }

    function add($data){
        $this->members->open();
        $this->members->add($data);
        $this->members->close();
        
        header("location:index.php");
    }
    
    function edit($id, $data){
        $this->members->open();
        $this->members->update($id, $data);
        $this->members->close();
    
        header("location:index.php");
    }
    
    function delete($id){
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();
    
        header("location:index.php");
    }
}
?>
