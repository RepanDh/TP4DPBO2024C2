<?php

class Members extends DB{

    function getMembers() {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }
    
    function getMembersJoin() {
        $query = "SELECT * FROM members JOIN addresses ON members.id=addresses.member_id ORDER BY members.id";
        return $this->execute($query);
    }
    
    
    function getMembersById($id) {
        $query = "select * from members where id=$id";
        return $this->execute($query);
    }

    function add($data){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`) VALUES ( '$name', '$email', '$phone' )";

        return $this->execute($query);
    }

    function delete($id){
        $query = "DELETE from `members` where id=$id";
        return $this->execute($query);
    }

    function update($id, $data){
        $name=$data["name"];
        $email=$data["email"];
        $phone=$data["phone"];

        $query = "update members set name='$name', email='$email', phone='$phone' where id='$id'";
        return $this->execute($query);
        
    }
}

?>