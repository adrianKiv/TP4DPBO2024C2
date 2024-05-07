<?php

class Member extends DB{
    function getMember(){
        $query = "SELECT * FROM member";
        return $this->execute($query);
    }

    function getMemberById($id){
        $query = "SELECT * FROM member
        JOIN countries ON member.id_countries=countries.id_countries 
        WHERE id_member = $id";
        return $this->execute($query);
    }

    function getmemberJoin(){
        $query = "SELECT * FROM member 
        JOIN countries ON member.id_countries=countries.id_countries 
        ORDER BY member.id_member";
        return $this->execute($query);
    }

    function addmember($data){
        $nama = $data['nama'];
        $email = $data['email'];
        $no_telpon = $data['no_telpon'];
        $tanggal_masuk = date('Y-m-d');
        $id_countries = $data['id_countries'];

        $query = "INSERT INTO member (nama, email, no_telpon, tanggal_masuk, id_countries) values ('$nama', '$email', '$no_telpon', '$tanggal_masuk', '$id_countries')";
        return $this->execute($query);
    }

    function updatemember($data){
        // var_dump($data);
        // die();
        $id = $data['id_member'];
        $nama = $data['nama'];
        $email = $data['email'];
        $no_telpon = $data['no_telpon'];
        $tanggal_masuk = date('Y-m-d');
        $id_countries = $data['id_countries'];

        $query = "UPDATE member SET nama = '$nama', email = '$email', no_telpon = '$no_telpon', tanggal_masuk = '$tanggal_masuk', id_countries = '$id_countries' WHERE id_member = $id";
        return $this->execute($query);
    }

    function deletemember($id){
        $query = "DELETE FROM member WHERE id_member = '$id'";
        return $this->execute($query);
    }
}