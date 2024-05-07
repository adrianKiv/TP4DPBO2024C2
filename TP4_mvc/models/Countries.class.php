<?php

class Countries extends DB{
    function getcountries(){
        $query = "SELECT * FROM countries";
        return $this->execute($query);
    }

    function getcountriesById($id){
        $query = "SELECT * FROM countries WHERE id_countries=$id";
        return $this->execute($query);
    }

    function addcountries($data){
        $nama_countries = $data['nama_countries'];
        $query = "INSERT INTO countries VALUES('', '$nama_countries')";
        return $this->execute($query);
    }

    function updatecountries($data){
        // var_dump($data);
        // die();
        $id = $data['id_countries'];
        $nama_countries = $data['nama_countries'];
        $query = "UPDATE countries SET nama_countries='$nama_countries' WHERE id_countries=$id";
        return $this->execute($query);
    }

    function deletecountries($id){
        $query = "DELETE FROM countries WHERE id_countries=$id";
        return $this->execute($query);
    }
}