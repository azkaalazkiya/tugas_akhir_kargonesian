<?php
    // nemapung lokasi path untuk akses kedatabase
    $aksi = "modul/mod_distributor/aksi_distributor.php";
    
    //mengatasi variabel yang belum di definisikan (notice undefined index)
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    // percabangan untuk memilih tampilan yang ingin ditampilkan
    switch($act){
        default:
            echo "
                <h3 class='page-header text-primary'> Data Distributor </h3>
            ";
            echo "
                <h3>
                    <button
                        class='btn btn-sm btn-primary'
                        type='button' style='width:20%'
                        onclick=window.location.href='?page=distributor&act=tambah'>
                            <span class='glyphicon glyphicon-plus'></span> Tambah Data
                    </button>
                </h3>
            ";

            // membuat tag table untuk menampilkan data
            echo"<table class='table table-bordered table-hover'>";
                echo"                
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th width='10%'>ID</th>
                            <th width='25%'>Nama</th>
                            <th width='25%'>Alamat</th>
                            <th width='20%'>Telepon</th>
                            <th width='15%'>Aksi</th>
                        </tr>
                    </thead>
                ";
                echo "<tbody>";
                    // query untuk menampilkan data
                    $query  = pg_query($koneksi, "SELECT * FROM tb_distributor ORDER BY nama_distributor");
                    $total  = pg_num_rows($query);
                    $no     = 1;

                    // menampilkan data perbaris ke dalam tag table
                    while($r = pg_fetch_array($query)){
                        echo"
                            <tr>
                                <td>$no</td>
                                <td>$r[id_distributor]</td>
                                <td>$r[nama_distributor]</td>
                                <td>$r[alamat]</td>
                                <td>$r[no_telepon]</td>
                                <td>
                                    <a href='?page=distributor&act=ubah&id_distributor=$r[id_distributor]'>
                                        <button type='button' class='btn btn-sm btn-warning'>
                                            <span class='glyphicon glyphicon-edit'></span>
                                        </button>
                                    </a>
                                    <a href='$aksi?page=distributor&act=hapus&id_distributor=$r[id_distributor]'>
                                        <button type='button' class='btn btn-sm btn-danger'>
                                            <span class='glyphicon glyphicon-trash'></span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        ";
                        $no++;
                    }
                echo "</tbody>";
            echo"</table>";
        break;

        case "tambah":
            echo "<div class='panel panel-default center-block'>";
                echo "<div class='panel-heading'>Form tambah data</div>";
                echo "<div class='panel-body'>";
                    echo "
                        <form role='form' action='$aksi?page=distributor&act=tambah' method='post' name='frm_tambah' id='frm_tambah' enctype='multipart/form-data'>
                            <div class='form-group'>
                                <label>ID</label>
                                <input class='form-control' type='text' name='txt_id' id='txt_id' placeholder='Masukan id' required>
                            </div>

                            <div class='form-group'>
                                <label>Nama lengkap</label>
                                <input class='form-control' type='text' name='txt_nama' id='txt_nama' placeholder='Masukan nama lengkap' required>
                            </div>

                            <div class='form-group'>
                                <label>Alamat</label>
                                <input class='form-control' type='text' name='txt_alamat' id='txt_alamat' placeholder='Masukan alamat' rows='5' required></textarea>
                            </div>

                            <div class='form-group'>
                                <label>Telepon</label>
                                <input class='form-control' type='text' name='txt_telepon' id='txt_telepon' placeholder='Masukan telepon' required>
                            </div>
                            
                            <div class='form-group'>
                                <button class='btn btn-sm btn-primary' type='submit' style='width:20%'><span class='glyphicon glyphicon-save'></span> Simpan</button>
                            </div>
                        </form>
                    ";
                echo "</div>"; // tutup tag body panel
            echo "</div>"; // tutup tag panel
        break;

        case "ubah":
            // Query SQL
            $query  = pg_query($koneksi,"SELECT * FROM tb_distributor WHERE id_distributor='$_GET[id_distributor]'");
            $r      = pg_fetch_array($query);

            // Panel ubah data
            echo "<div class='panel panel-default center-block'>";
                echo "<div class='panel-heading'>Form ubah data</div>";
                echo "<div class='panel-body'>";
                    echo "<form role='form' action='$aksi?page=distributor&act=ubah' method='post' name='frm_ubah' id='frm_ubah' enctype='multipart/form-data'>";
                        
                        // ID
                        echo "
                            <div class='form-group'>
                                <label>ID</label>
                                <input class='form-control' type='text' name='txt_id' id='txt_id' placeholder='Masukan id' value='$r[id_distributor]' readonly>
                            </div>
                        ";
                        
                        // Nama
                        echo "
                            <div class='form-group'>
                                <label>Nama</label>
                                <input class='form-control' type='text' name='txt_nama' id_distributor='txt_nama' placeholder='Masukan nama lengkap' value='$r[nama_distributor]' required>
                            </div>
                        ";
                        
                       
                        // Alamat
                        echo"
                            <div class='form-group'>
                                <label>Alamat</label>
                                <textarea class='form-control' name='txt_alamat' id_distributor='txt_alamat' placeholder='Masukan alamat' rows='5' required>$r[alamat]</textarea>
                            </div>
                        ";

                        // Telepon
                        echo"
                            <div class='form-group'>
                                <label>Telepon</label>
                                <input class='form-control' type='text' name='txt_telepon' id='txt_telepon' placeholder='Masukan telepon' value='$r[no_telepon]' required>
                            </div>
                        ";

                        // Submit
                        echo"
                            <div class='form-group'>
                                <button class='btn btn-sm btn-primary' type='submit' style='width:20%'><span class='glyphicon glyphicon-save'></span> Simpan</button>
                            </div>
                        ";

                    echo "</form>"; // tutup tag form
                echo "</div>"; // tutup tag body panel
            echo "</div>"; // tutup tag panel
        break;
    }
?> 