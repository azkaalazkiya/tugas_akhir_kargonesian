<?php
// open koneksi
include "../../config/koneksi.php";

// direct link untuk menentukan aksi
$page	= $_GET['page'];
$act	= $_GET['act'];

// Aksi menambah data
if($page == 'catatan' AND $act == 'tambah'){
    try{
        // variabel untuk menampung nilai-nilai dari form tambah
        $id_catatanbarang                 = $_POST['txt_id_catatanbarang'];
        $id_ekspedisi                     = $_POST['txt_id_ekspedisi'];
        $id_distributor                   = $_POST['txt_id_distributor'];
        $id_pelanggan           = $_POST['txt_id_pelanggan'];
        $id_keberangkatan           = $_POST['txt_id_keberangkatan'];
        $berat         = $_POST['txt_berat'];
        $harga         = $_POST['txt_harga'];

      
        // query untuk cek apakah primary dapat digunakan
        $cek    = pg_query($koneksi,"SELECT * FROM tb_catatanbarang WHERE id_catatanbarang='$id_catatanbarang'");

        // validasi primary 
        if(pg_num_rows($cek) == 0){
            // query tambah data
            $sql    =   "INSERT INTO tb_catatanbarang
                            (id_catatanbarang, id_distributor, id_pelanggan, id_ekspedisi, id_keberangkatan, berat, harga)
                        VALUES(
                                '$id_catatanbarang ',
                                '$id_distributor',
                                '$id_pelanggan',
                                '$id_ekspedisi',
                                '$id_keberangkatan',
                                '$berat',
                                '$harga'
                            )";
            // execute query
            $query  = pg_query($koneksi,$sql);

            // query untuk cek apakah data berhasil disimpan
            $cek    = pg_query($koneksi,"SELECT * FROM tb_catatanbarang WHERE id_catatanbarang='$id_catatanbarang'");
            
            // validasi apakah data berhasil disimpan
            if(pg_num_rows($cek) != 0){
                echo "
                    <script type='text/javascript'>
                        alert('Data berhasil disimpan');
                        window.location.href='../../media.php?page=catatan';
                    </script>
                ";
            }else{
                echo "
                    <script type='text/javascript'>
                        alert('Data berhasil disimpan');
                        window.location.href='../../media.php?page=catatan';
                    </script>
                ";
            }
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil disimpan');
                    window.location.href='../../media.php?page=catatan';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>