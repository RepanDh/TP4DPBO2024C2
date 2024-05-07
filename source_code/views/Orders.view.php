<?php
class OrdersView{
    public function render($data){
        $dataOrders = null;
        $dataHead = null;

        $dataHead .= '
            <tr>
                <th>ORDER ID</th>
                <th>MEMBER</th>
                <th>PRODUCT</th>
                <th>ORDER DATE</th>
                <th>ACTIONS</th>
            </tr>';

        foreach($data as $val){
            $order_id = $val['order_id'];
            $member_name = $val['name'];
            $product = $val['product'];
            $order_date = $val['order_date'];

            $dataOrders .= "
            <tr>
                <th>". $order_id ."</th>
                <td>". $member_name ."</td>
                <td>". $product ."</td>
                <td>". $order_date ."</td>
                <td>
                    <a class='btn btn-success' href='orders.php?id_edit=".$order_id."'>Edit</a>
                    <a class='btn btn-danger' href='orders.php?id_hapus=".$order_id."'>Delete</a>
                </td>
            </tr>
            ";
        }

        $tpl = new Template("templates/orders.html");
        $idxACT = 'active';
        $addLink = 'orders';

        $tpl->replace("IDXACTIVE", $idxACT);

        $tpl->replace("DATA_TABEL", $dataOrders);
        $tpl->replace("DATA_HEAD", $dataHead);
        $tpl->replace("DATA_ADD_LINK", $addLink);
        $tpl->write(); 
    }
}
?>
