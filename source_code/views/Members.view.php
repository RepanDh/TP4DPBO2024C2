<?php
    class MembersView{
        public function render($data){
            $dataMembers = null;
            $dataHead = null;

            $dataHead .= '
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>JOINING DATE</th>
                    <th>ACTIONS</th>
                </tr>';

            foreach($data as $val){
                $id = $val['id'];
                $name = $val['name'];
                $email = $val['email'];
                $phone = $val['phone'];
                $join_date = $val['join_date'];
                $dataMembers .= "
                <tr>
                    <th>". $id ."</th>
                    <td>". $name ."</td>
                    <td>". $email ."</td>
                    <td>". $phone ."</td>
                    <td>". $join_date ."</td>
                    <td>
                        <a class='btn btn-success' href='index.php?id_edit=".$id."'>Edit</a>
                        <a class='btn btn-danger' href='index.php?id_hapus=".$id."'>Delete</a>
                    </td>
                </tr>
                ";
            }
            $tpl = new Template("templates/index.html");
            $idxACT = 'active';
            $addLink = 'index';

            $tpl->replace("IDXACTIVE", $idxACT);

            $tpl->replace("DATA_TABEL", $dataMembers);
            $tpl->replace("DATA_HEAD", $dataHead);
            $tpl->replace("DATA_ADD_LINK", $addLink);
            $tpl->write(); 
        }
    }

?>