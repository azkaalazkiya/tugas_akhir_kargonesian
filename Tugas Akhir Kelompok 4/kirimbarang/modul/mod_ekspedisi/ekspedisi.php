<?php
    // nemapung lokasi path untuk akses kedatabase
    $aksi = "modul/mod_ekspedisi/aksi_ekspedisi.php";
    
    //mengatasi variabel yang belum di definisikan (notice undefined index)
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    // percabangan untuk memilih tampilan yang ingin ditampilkan
    switch($act){
        default:
            echo "
                <h3 class='page-header text-primary'> Data Ekspedisi </h3>
            ";
            echo "
                <h3>
                    <button
                        class='btn btn-sm btn-primary'
                        type='button' style='width:20%'
                        onclick=window.location.href='?page=ekspedisi&act=tambah'>
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
                    $query  = pg_query($koneksi, "SELECT * FROM tb_ekspedisi ORDER BY nama_ekspedisi");
                    $total  = pg_num_rows($query);
                    $no     = 1;

                    // menampilkan data perbaris ke dalam tag table
                    while($r = pg_fetch_array($query)){
                        echo"
                            <tr>
                                <td>$no</td>
                                <td>$r[id_ekspedisi]</td>
                                <td>$r[nama_ekspedisi]</td>
                                <td>$r[alamat]</td>
                                <td>$r[no_telepon]</td>
                                <td>
                                    <a href='?page=ekspedisi&act=ubah&id_ekspedisi=$r[id_ekspedisi]'>
                                        <button type='button' class='btn btn-sm btn-warning'>
                                            <span class='glyphicon glyphicon-edit'></span>
                                        </button>
                                    </a>
                                    <a href='$aksi?page=ekspedisi&act=hapus&id_ekspedisi=$r[id_ekspedisi]'>
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
                        <form role='form' action='$aksi?page=ekspedisi&act=tambah' method='post' name='frm_tambah' id='frm_tambah' enctype='multipart/form-data'>
                            <div class='form-group'>
                                <label>ID</label>
                                <input class='form-control' type='text' name='txt_id' id='txt_id' placeholder='Masukan id' required>
                            </div>

                            <div class='form-group'>
                                <label>Nama Ekspedisi</label>
                                <input class='form-control' type='text' name='txt_nama' id='txt_nama' placeholder='Masukan nama ekspedisi' required>
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
            $query  = pg_query($koneksi,"SELECT * FROM tb_ekspedisi WHERE id_ekspedisi='$_GET[id_ekspedisi]'");
            $r      = pg_fetch_array($query);

            // Panel ubah data
            echo "<div class='panel panel-default center-block'>";
                echo "<div class='panel-heading'>Form ubah data</div>";
                echo "<div class='panel-body'>";
                    echo "<form role='form' action='$aksi?page=ekspedisi&act=ubah' method='post' name='frm_ubah' id='frm_ubah' enctype='multipart/form-data'>";
                        
                        // ID
                        echo "
                            <div class='form-group'>
                                <label>ID</label>
                                <input class='form-control' type='text' name='txt_id' id_ekspedisi='txt_id' placeholder='Masukan id' value='$r[id_ekspedisi]' readonly>
                            </div>
                        ";
                        
                        // Nama
                        echo "
                            <div class='form-group'>
                                <label>Nama</label>
                                <input class='form-control' type='text' name='txt_nama' id_ekspedisi='txt_nama' placeholder='Masukan nama lengkap' value='$r[nama_ekspedisi]' required>
                            </div>
                        ";
                        
                       
                        // Alamat
                        echo"
                            <div class='form-group'>
                                <label>Alamat</label>
                                <textarea class='form-control' name='txt_alamat' id_ekspedisi='txt_alamat' placeholder='Masukan alamat' rows='5' required>$r[alamat]</textarea>
                            </div>
                        ";

                        // Telepon
                        echo"
                            <div class='form-group'>
                                <label>Telepon</label>
                                <input class='form-control' type='text' name='txt_telepon' id_ekspedisi='txt_telepon' placeholder='Masukan telepon' value='$r[no_telepon]' required>
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