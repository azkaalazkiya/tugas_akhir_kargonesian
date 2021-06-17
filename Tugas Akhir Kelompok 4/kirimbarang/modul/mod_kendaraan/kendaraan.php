<?php
    // nemapung lokasi path untuk akses kedatabase
    $aksi = "modul/mod_kendaraan/aksi_kendaraan.php";
    
    //mengatasi variabel yang belum di definisikan (notice undefined index)
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    // percabangan untuk memilih tampilan yang ingin ditampilkan
    switch($act){
        default:
            echo "
                <h3 class='page-header text-primary'> Data Kendaraan </h3>
            ";
            echo "
                <h3>
                    <button
                        class='btn btn-sm btn-primary'
                        type='button' style='width:20%'
                        onclick=window.location.href='?page=kendaraan&act=tambah'>
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
                            <th width='25%'>Nama Kapal</th>
                            <th width='25%'>Tanggal Kirim</th>
                            <th width='20%'>Tujuan</th>
                            <th width='15%'>Aksi</th>
                        </tr>
                    </thead>
                ";
                echo "<tbody>";
                    // query untuk menampilkan data
                    $query  = pg_query($koneksi, "SELECT * FROM tb_kendaraan ORDER BY nama_kapal");
                    $total  = pg_num_rows($query);
                    $no     = 1;

                    // menampilkan data perbaris ke dalam tag table
                    while($r = pg_fetch_array($query)){
                        echo"
                            <tr>
                                <td>$no</td>
                                <td>$r[id_kendaraan]</td>
                                <td>$r[nama_kapal]</td>
                                <td>$r[tanggal_pengiriman]</td>
                                <td>$r[kota_tujuan]</td>
                                <td>
                                    <a href='?page=kendaraan&act=ubah&id_kendaraan=$r[id_kendaraan]'>
                                        <button type='button' class='btn btn-sm btn-warning'>
                                            <span class='glyphicon glyphicon-edit'></span>
                                        </button>
                                    </a>
                                    <a href='$aksi?page=kendaraan&act=hapus&id_kendaraan=$r[id_kendaraan]'>
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
                        <form role='form' action='$aksi?page=kendaraan&act=tambah' method='post' name='frm_tambah' id='frm_tambah' enctype='multipart/form-data'>
                            <div class='form-group'>
                                <label>ID</label>
                                <input class='form-control' type='text' name='txt_id' id_kendaraan='txt_id' placeholder='Masukan id' required>
                            </div>

                            <div class='form-group'>
                                <label>Nama Kapal</label>
                                <input class='form-control' type='text' name='txt_nama_kapal' id_kendaraan='txt_nama_kapal' placeholder='Masukan nama kapal' required>
                            </div>

                            <div class='form-group'>
                                <label>Tanggal Pengiriman</label>
                                <input class='form-control' type='date' name='txt_tanggal_pengiriman' id='txt_tanggal_pengiriman' placeholder='Masukan tanggal pengiriman' required>
                            </div>

                            <div class='form-group'>
                                <label>Tujuan</label>
                                <input class='form-control' type='text' name='txt_kota_tujuan' id_kendaraan='txt_kota_tujuan' placeholder='Masukan tujuan' required>
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
            $query  = pg_query($koneksi,"SELECT * FROM tb_kendaraan WHERE id_kendaraan='$_GET[id_kendaraan]'");
            $r      = pg_fetch_array($query);

            // Panel ubah data
            echo "<div class='panel panel-default center-block'>";
                echo "<div class='panel-heading'>Form ubah data</div>";
                echo "<div class='panel-body'>";
                    echo "<form role='form' action='$aksi?page=kendaraan&act=ubah' method='post' name='frm_ubah' id='frm_ubah' enctype='multipart/form-data'>";
                        
                        // ID
                        echo "
                            <div class='form-group'>
                                <label>ID</label>
                                <input class='form-control' type='text' name='txt_id' id_kendaraan='txt_id' placeholder='Masukan id' value='$r[id_kendaraan]' readonly>
                            </div>
                        ";
                        
                        // Nama Kapal
                        echo "
                            <div class='form-group'>
                                <label>Nama Kapal</label>
                                <input class='form-control' type='text' name='txt_nama_kapal' id_kendaraan='txt_nama_kapal' placeholder='Masukan nama kapal' value='$r[nama_kapal]' required>
                            </div>
                        ";
                        
                       
                        // Tanggal Kirim
                        echo"
                            <div class='form-group'>
                                <label>Tanggal Kirim</label>
                                <input class='form-control' type='date' name='txt_tanggal_pengiriman' id_kendaraan='txt_tanggal_pengiriman' placeholder='Masukan tanggal pengiriman' value='$r[tanggal_pengiriman]' required>
                            </div>
                        ";

                        // Tujuan
                        echo"
                            <div class='form-group'>
                                <label>Tujuan</label>
                                <input class='form-control' type='text' name='txt_kota_tujuan' id_kendaraan='txt_kota_tujuan' placeholder='Masukan tujuan' value='$r[kota_tujuan]' required>
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