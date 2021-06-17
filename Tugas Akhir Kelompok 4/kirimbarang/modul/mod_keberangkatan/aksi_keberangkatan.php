<?php
// open koneksi
include "../../config/koneksi.php";

// direct link untuk menentukan aksi
$page	= $_GET['page'];
$act	= $_GET['act'];

// Aksi menambah data
if($page == 'keberangkatan' AND $act == 'tambah'){
    try{
        // variabel untuk menampung nilai-nilai dari form tambah
        $id_keberangkatan                 = $_POST['txt_id'];
        $nama_kapal                   = $_POST['txt_nama_kapal'];
        $tanggal_pengiriman           = $_POST['txt_tanggal_pengiriman'];
        $kota_tujuan                  = $_POST['txt_kota_tujuan'];
      
        // query untuk cek apakah primary dapat digunakan
        $cek    = pg_query($koneksi,"SELECT * FROM tb_keberangkatan WHERE id_keberangkatan='$id_keberangkatan'");

        // validasi primary 
        if(pg_num_rows($cek) == 0){
            // query tambah data
            $sql    =   "INSERT INTO tb_keberangkatan
                            (id_keberangkatan, nama_kapal, tanggal_pengiriman, kota_tujuan)
                        VALUES(
                                '$id_keberangkatan',
                                '$nama_kapal',
                                '$tanggal_pengiriman',
                                '$kota_tujuan'
                            )";
            // execute query
            $query  = pg_query($koneksi,$sql);

            // query untuk cek apakah data berhasil disimpan
            $cek    = pg_query($koneksi,"SELECT * FROM tb_keberangkatan WHERE id_keberangkatan='$id_keberangkatan'");
            
            // validasi apakah data berhasil disimpan
            if(pg_num_rows($cek) != 0){
                echo "
                    <script type='text/javascript'>
                        alert('Data berhasil disimpan');
                        window.location.href='../../media.php?page=keberangkatan';
                    </script>
                ";
            }else{
                echo "
                    <script type='text/javascript'>
                        alert('Data gagal disimpan');
                        window.location.href='../../media.php?page=keberangkatan';
                    </script>
                ";
            }
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=keberangkatan';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi merubah data
if($page == 'keberangkatan' AND $act == 'ubah'){
    try{
        // variabel untuk menampung nilai-nilai dari form ubah
        $id_keberangkatan                 = $_POST['txt_id'];
        $nama_kapal                   = $_POST['txt_nama_kapal'];
        $tanggal_pengiriman           = $_POST['txt_tanggal_pengiriman'];
        $kota_tujuan                  = $_POST['txt_kota_tujuan'];

        // query ubah data
        $sql    = "UPDATE tb_keberangkatan set
                    nama_kapal   = '$nama_kapal',
                    tanggal_pengiriman   = '$tanggal_pengiriman',
                    kota_tujuan           = '$kota_tujuan'
                        where id_keberangkatan = '$id_keberangkatan';
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);
        
        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil disimpan');
                    window.location.href='../../media.php?page=keberangkatan';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=keberangkatan';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi menghapus data
if($page == 'keberangkatan' AND $act == 'hapus'){
    try{
        // variabel untuk menampung nilai-nilai dari form hapus
        $id_keberangkatan = $_GET['id_keberangkatan'];

        // Query untuk menghapus data
        $sql = "DELETE FROM tb_keberangkatan 
                WHERE id_keberangkatan='$id_keberangkatan'
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);

        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil dihapus');
                    window.location.href='../../media.php?page=keberangkatan';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal dihapus');
                    window.location.href='../../media.php?page=keberangkatan';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>