<?php
class Addresses extends DB{
    function getAddresses() {
        $query = "SELECT * FROM addresses";
        return $this->execute($query);
    }
    
    function getAddressesJoin() {
        $query = "SELECT * FROM addresses JOIN members ON addresses.member_id=members.id ORDER BY addresses.address_id";
        return $this->execute($query);
    }
    function getAddressesName() {
        $query = "SELECT
        members.`name`
        FROM
        addresses ,
        members
        ";
        return $this->execute($query);
    }

    
    function getAddressesById($id) {
        $query = "select * from addresses where address_id=$id";
        return $this->execute($query);
    }

    function add($data){
        $member_id = $data['member_id'];
        $kelurahan = $data['kelurahan'];
        $kecamatan = $data['kecamatan'];
        $kabupaten = $data['kabupaten'];

        $query = " INSERT INTO `addresses`(`member_id`, `kelurahan`, `kecamatan`, `kabupaten`) VALUES ( '$member_id', '$kelurahan', '$kecamatan', '$kabupaten')";

        return $this->execute($query);
    }

    function delete($id){
        $query = "DELETE from `addresses` where address_id=$id";
        return $this->execute($query);
    }

    function update($id, $data){
        $member_id=$data["member_id"];
        $kelurahan=$data["kelurahan"];
        $kecamatan=$data["kecamatan"];
        $kabupaten=$data["kabupaten"];

        $query = "update addresses set member_id='$member_id', kelurahan='$kelurahan', kecamatan='$kecamatan', kabupaten='$kabupaten' where address_id='$id'";
        return $this->execute($query);
    }
}
