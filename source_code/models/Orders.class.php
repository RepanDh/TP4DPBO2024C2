<?php
class Orders extends DB{
    function getOrders() {
        $query = "SELECT * FROM orders";
        return $this->execute($query);
    }
    
    function getOrdersJoin() {
        $query = "SELECT * FROM orders JOIN members ON orders.member_id=members.id ORDER BY orders.order_id";
        return $this->execute($query);
    }
    
    function getOrdersById($id) {
        $query = "select * from orders where order_id=$id";
        return $this->execute($query);
    }

    function add($data){
        $member_id = $data['member_id'];
        $product = $data['product'];

        $query = " INSERT INTO `orders`(`member_id`, `product`) VALUES ( '$member_id', '$product' )";

        return $this->execute($query);
    }

    function delete($id){
        $query = "DELETE from `orders` where order_id=$id";
        return $this->execute($query);
    }

    function update($id, $data){
        $member_id=$data["member_id"];
        $product=$data["product"];

        $query = "update orders set member_id='$member_id', product='$product' where order_id='$id'";
        return $this->execute($query);
    }
}
