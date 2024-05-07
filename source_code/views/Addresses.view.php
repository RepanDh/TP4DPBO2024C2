<?php
class AddressesView{
    public function render($data){
        $dataAddresses = null;
        $dataHead = null;

        $dataHead .= '
            <tr>
                <th>ADDRESS ID</th>
                <th>MEMBER</th>
                <th>KELURAHAN</th>
                <th>KECAMATAN</th>
                <th>KABUPATEN</th>
                <th>ACTIONS</th>
            </tr>';

        foreach($data as $val){
            $address_id = $val['address_id'];
            $member_name = $val['name'];
            $kelurahan = $val['kelurahan'];
            $kecamatan = $val['kecamatan'];
            $kabupaten = $val['kabupaten'];

            $dataAddresses .= "
            <tr>
                <th>". $address_id ."</th>
                <td>". $member_name ."</td>
                <td>". $kelurahan ."</td>
                <td>". $kecamatan ."</td>
                <td>". $kabupaten ."</td>
                <td>
                    <a class='btn btn-success' href='addresses.php?id_edit=".$address_id."'>Edit</a>
                    <a class='btn btn-danger' href='addresses.php?id_hapus=".$address_id."'>Delete</a>
                </td>
            </tr>
            ";
        }

        $tpl = new Template("templates/addresses.html");
        $idxACT = 'active';
        $addLink = 'addresses';

        $tpl->replace("IDXACTIVE", $idxACT);

        $tpl->replace("DATA_TABEL", $dataAddresses);
        $tpl->replace("DATA_HEAD", $dataHead);
        $tpl->replace("DATA_ADD_LINK", $addLink);
        $tpl->write(); 
    }
}
?>
