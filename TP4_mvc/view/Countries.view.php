<?php
  class CountriesView{
    public function rendercountries($data){
        $no = 1;
        $dataHeader = "
        <tr>
          <th>NO</th>
          <th>NAMA NEGARA</th>
          <th>ACTIONS</th>
        </tr>
        ";
        
        $datacountries = null;
        foreach($data as $val){
            $datacountries .= "
                <tbody>
                    <tr>
                      <td>$no</td>
                      <td>" . $val['nama_countries'] . "</td>
                      <td>
                      <a href='updatecountries.php?update=$val[id_countries]' class='btn btn-outline-warning'>Edit</a>
                      <a href='countries.php?delete=$val[id_countries]' class='btn btn-outline-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                      </td>
                    </tr>
                </tbody>";
            $no++;
          }

        $linkadd = "addcountries.php";

        $view = new Template("templates/skinindex.html");
        $view->replace("DATA_HEADER", $dataHeader);
        $view->replace("DATA_TABLE", $datacountries);
        $view->replace("LINK_ADD", $linkadd);
        $view->replace("COUNTRIES_ACTIVE", "active");
        $view->replace("DIVISION_ACTIVE", "");
        $view->write();
    }

    public function renderadd(){
        $dataForm = '
        <form action="addcountries.php" method="post" role="form" id="form-add">
 
          <br><br><div class="card">
          
          <div class="card-header bg-dark">
          <h1 class="text-white text-center">  Add countries </h1>
          </div><br>

          <input type="hidden" name="id_countries" class="form-control"> <br>

          <label for="nama_countries"> NAMA NEGARA: </label>
          <input type="text" name="nama_countries" class="form-control" required> <br>

          <button class="btn btn-outline-success" type="submit" name="tambah" form="form-add"> Submit </button><br>
          <a class="btn btn-outline-danger" type="submit" name="cancel" href="countries.php"> Cancel </a><br>

          </div>
        </form>
        ';

        $view = new Template("templates/skinform.html");
        $view->replace("FORM", $dataForm);
        // $view->replace("DATA_ADD_LINK", "create_countriess.php");
        $view->write();
    }

    public function renderupdate($data){
        $dataForm = '
        <form action="updatecountries.php" method="post">
            <br><br><div class="card">
            
            <div class="card-header bg-dark">
                <h1 class="text-white text-center">  Update countries </h1>
            </div><br>

            <input type="hidden" name="id_countries" value="'. $data['id_countries'] .'" class="form-control"> <br>

            <label> NAME NEGARA: </label>
            <input type="text" name="nama_countries" value="'. $data['nama_countries'] .'" class="form-control"> <br>

            <button class="btn btn-outline-success" type="submit" name="update"> Submit </button><br>
            <a class="btn btn-outline-danger" type="submit" name="cancel" href="countries.php"> Cancel </a><br>

            </div>
        </form>
        ';

        $view = new Template("templates/skinform.html");
        $view->replace("FORM", $dataForm);
        $view->write();
    }
  }