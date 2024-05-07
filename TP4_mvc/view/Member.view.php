<?php
  class MemberView{
    public function rendermember($data){
        $no = 1;
        $dataHeader = "
        <tr>
          <th>NO</th>
          <th>NAMA</th>
          <th>EMAIL</th>
          <th>NO TELPON</th>
          <th>JOINING DATE</th>
          <th>COUNTRIES</th>
          <th>ACTIONS</th>
        </tr>
        ";
        
        $dataMember = null;
        foreach($data as $val){
            $dataMember .= "
                <tbody>
                    <tr>
                      <td>$no</td>
                      <td>" . $val['nama'] . "</td>
                      <td>" . $val['email'] . "</td>
                      <td>" . $val['no_telpon'] . "</td>
                      <td>" . $val['tanggal_masuk'] . "</td>
                      <td>" . $val['nama_countries'] . "</td>
                      <td>
                      <a href='updatemember.php?update=$val[id_member]' class='btn btn-outline-warning'>Edit</a>
                      <a href='index.php?delete=$val[id_member]' class='btn btn-outline-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                      </td>
                    </tr>
                </tbody>";
            $no++;
          }

        $linkadd = "addmember.php";

        $view = new Template("templates/skinindex.html");
        $view->replace("DATA_HEADER", $dataHeader);
        $view->replace("DATA_TABLE", $dataMember);
        $view->replace("LINK_ADD", $linkadd);
        $view->replace("HOME_ACTIVE", "active");
        $view->replace("DIVISION_ACTIVE", "");
        $view->write();
    }

    public function renderadd($countries){
        $datacountries = null;

        foreach($countries as $country){
            $datacountries .= '<option value="'.$country['id_countries'].'">'. $country['nama_countries'].'</option>';
        }

        $dataForm = '
        <form action="addmember.php" method="post" role="form" id="form-add">
 
          <br><br><div class="card">
          
          <div class="card-header bg-dark">
          <h1 class="text-white text-center">  Add Member </h1>
          </div><br>

          <input type="hidden" name="id_member" class="form-control"> <br>

          <label for="nama"> NAMA: </label>
          <input type="text" name="nama" class="form-control" required> <br>

          <label> EMAIL: </label>
          <input type="text" name="email" class="form-control" required> <br>

          <label> NO TELPON: </label>
          <input type="text" name="no_telpon" class="form-control" required> <br>

          <label> COUNTRIES: </label>
            <select class="form-select" aria-label="Category" id="id_countries" name="id_countries" required>
                <option value="" selected disabled hidden>Pilih</option>
                '.$datacountries.'
            </select> <br>

          <button class="btn btn-outline-success" type="submit" name="tambah" form="form-add"> Submit </button><br>
          <a class="btn btn-outline-danger" type="submit" name="cancel" href="index.php"> Cancel </a><br>

          </div>
        </form>
        ';

        $view = new Template("templates/skinform.html");
        $view->replace("FORM", $dataForm);
        // $view->replace("DATA_ADD_LINK", "create_members.php");
        $view->write();
    }

    public function renderupdate($data){
        $datacountries = null;

        foreach($data['countries'] as $country){
            $datacountries .= '<option value="'.$country['id_countries'].'" '. ($country['id_countries'] == $data['id_countries'] ? 'selected' : '') .'>'. $country['nama_countries'].'</option>';
        }

        // list($id, $nama, $email, $no_telpon) = $data;
        $dataForm = '
        <form action="updatemember.php" method="post">
            <br><br><div class="card">
            
            <div class="card-header bg-dark">
                <h1 class="text-white text-center">  Update Member </h1>
            </div><br>

            <input type="hidden" name="id_member" value="'. $data['id_member'] .'" class="form-control"> <br>

            <label> NAME: </label>
            <input type="text" name="nama" value="'. $data['nama'] .'" class="form-control"> <br>

            <label> EMAIL: </label>
            <input type="text" name="email" value="'. $data['email'] .'" class="form-control"> <br>

            <label> PHONE: </label>
            <input type="text" name="no_telpon" value="'. $data['no_telpon'] .'" class="form-control"> <br>

            <label> NEGARA: </label>
            <select class="form-select" aria-label="Category" id="id_countries" name="id_countries">
                <option value="" selected disabled hidden>Pilih</option>
                '.$datacountries.'
            </select> <br>

            <button class="btn btn-outline-success" type="submit" name="update"> Submit </button><br>
            <a class="btn btn-outline-danger" type="submit" name="cancel" href="index.php"> Cancel </a><br>

            </div>
        </form>
        ';

        $view = new Template("templates/skinform.html");
        $view->replace("FORM", $dataForm);
        $view->write();
    }
  }