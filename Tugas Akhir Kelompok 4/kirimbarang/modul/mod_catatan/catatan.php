<?php
    // nemapung lokasi path untuk akses kedatabase
    $aksi = "modul/mod_catatan/aksi_catatan.php";
    
    //mengatasi variabel yang belum di definisikan (notice undefined index)
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    // percabangan untuk memilih tampilan yang ingin ditampilkan
    switch($act){
        default:
            echo "
                <h3 class='page-header text-primary'> Data Catatan </h3>
            ";
            echo "
                <h3>
                    <button
                        class='btn btn-sm btn-primary'
                        type='button' style='width:20%'
                        onclick=window.location.href='?page=catatan&act=tambah'>
                            <span class='glyphicon glyphicon-plus'></span> Tambah Data
                    </button>
                </h3>    
            ";

            // membuat tag table untuk menampilkan data
            echo"<table class='table table-bordered table-hover'>";
                echo"                
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Ekspedisi</th>
                            <th>Distributor</th>
                            <th>Pelanggan</th>
                            <th>Kapal</th>
                            <th>Tujuan</th>
                            <th>Tanggal Pengiriman</th>
                            <th>Satuan (koli)</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                ";
                echo "<tbody>";
                    // query untuk menampilkan data
                    $query  = pg_query($koneksi, "SELECT C.id_catatanbarang, D.nama_ekspedisi, B.nama_distributor, A.nama_pelanggan, E.nama_kapal, E.kota_tujuan, E.tanggal_pengiriman, C.berat, C.harga
                                                    FROM tb_catatanbarang C
                                                        JOIN tb_ekspedisi D ON C.id_ekspedisi = D.id_ekspedisi
                                                        JOIN tb_distributor B ON C.id_distributor = B.id_distributor
                                                        JOIN tb_pelanggan A ON C.id_pelanggan = A.id_pelanggan 
                                                        JOIN tb_keberangkatan E on C.id_keberangkatan = E.id_keberangkatan
                                                    ORDER BY E.tanggal_pengiriman");
                    $total  = pg_num_rows($query);
                    $no     = 1;

                    // menampilkan data perbaris ke dalam tag table
                    while($r = pg_fetch_array($query)){
                        echo"
                            <tr>
                                <td>$no</td>
                                <td>$r[id_catatanbarang]</td>
                                <td>$r[nama_ekspedisi]</td>
                                <td>$r[nama_distributor]</td>
                                <td>$r[nama_pelanggan]</td>
                                <td>$r[nama_kapal]</td>
                                <td>$r[kota_tujuan]</td>
                                <td>$r[tanggal_pengiriman]</td>
                                <td>$r[berat]</td>
                                <td>$r[harga]</td>
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
                        <form role='form' action='$aksi?page=catatan&act=tambah' method='post' name='frm_tambah' id='frm_tambah' enctype='multipart/form-data'>
                            <div class='form-group'>
                                <label>ID Catatan Barang</label>
                                <input class='form-control' type='text' name='txt_id_catatanbarang' id_catatanbarang='txt_id_catatanbarang' placeholder='Masukan ID Catatan' required>
                            </div>

                            <div class='form-group'>
                                <label>ID Ekspedisi</label>
                                <input class='form-control' type='text' name='txt_id_ekspedisi' id_ekspedisi='txt_id_ekspedisi' placeholder='Masukan ID Ekspedisi' required>
                            </div>

                            <div class='form-group'>
                                <label>ID Distributor</label>
                                <input class='form-control' type='text' name='txt_id_distributor' id_distributor='txt_id_distributor' placeholder='Masukan ID Distributor' required>
                            </div>

                            <div class='form-group'>
                                <label>ID Pelanggan</label>
                                <input class='form-control' type='text' name='txt_id_pelanggan' id_pelanggan='txt_id_pelanggan' placeholder='Masukan ID Pelanggan' required>
                            </div>

                            <div class='form-group'>
                                <label>ID Keberangkatan</label>
                                <input class='form-control' type='text' name='txt_id_keberangkatan' id_keberangkatan='txt_id_keberangkatan' placeholder='Masukan ID Keberangkatan' required>
                            </div>

                            <div class='form-group'>
                                <label>Satuan (koli)</label>
                                <input class='form-control' type='bigint' name='txt_berat' id_catatanbarang='txt_berat' placeholder='Masukan satuan' required>
                            </div>

                            <div class='form-group'>
                                <label>Harga</label>
                                <input class='form-control' type='bigint' name='txt_harga' id_catatanbarang='txt_harga' placeholder='Masukan harga' required>
                            </div>

                            <div class='form-group'>
                                <button class='btn btn-sm btn-primary' type='submit' style='width:20%'><span class='glyphicon glyphicon-save'></span> Simpan</button>
                            </div>
                        </form>
                    ";
                echo "</div>"; // tutup tag body panel
            echo "</div>"; // tutup tag panel
        break;
    }
?> 