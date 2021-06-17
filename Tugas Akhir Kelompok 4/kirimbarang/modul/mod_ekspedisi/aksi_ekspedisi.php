<?php
// open koneksi
include "../../config/koneksi.php";

// direct link untuk menentukan aksi
$page	= $_GET['page'];
$act	= $_GET['act'];

// Aksi menambah data
if($page == 'ekspedisi' AND $act == 'tambah'){
    try{
        // variabel untuk menampung nilai-nilai dari form tambah
        $id_ekspedisi                 = $_POST['txt_id'];
        $nama_ekspedisi               = $_POST['txt_nama'];
        $alamat                       = $_POST['txt_alamat'];
        $no_telepon                   = $_POST['txt_telepon'];
      
        // query untuk cek apakah primary dapat digunakan
        $cek    = pg_query($koneksi,"SELECT * FROM tb_ekspedisi WHERE id_ekspedisi='$id_ekspedisi'");

        // validasi primary 
        if(pg_num_rows($cek) == 0){
            // query tambah data
            $sql    =   "INSERT INTO tb_ekspedisi
                            (id_ekspedisi, nama_ekspedisi, alamat, no_telepon)
                        VALUES(
                                '$id_ekspedisi',
                                '$nama_ekspedisi',
                                '$alamat',
                                '$no_telepon'
                            )";
            // execute query
            $query  = pg_query($koneksi,$sql);

            // query untuk cek apakah data berhasil disimpan
            $cek    = pg_query($koneksi,"SELECT * FROM tb_ekspedisi WHERE id_ekspedisi='$id_ekspedisi'");
            
            // validasi apakah data berhasil disimpan
            if(pg_num_rows($cek) != 0){
                echo "
                    <script type='text/javascript'>
                        alert('Data berhasil disimpan');
                        window.location.href='../../media.php?page=ekspedisi';
                    </script>
                ";
            }else{
                echo "
                    <script type='text/javascript'>
                        alert('Data gagal disimpan');
                        window.location.href='../../media.php?page=ekspedisi';
                    </script>
                ";
            }
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=ekspedisi';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi merubah data
if($page == 'ekspedisi' AND $act == 'ubah'){
    try{
        // variabel untuk menampung nilai-nilai dari form ubah
        $id_ekspedisi                 = $_POST['txt_id'];
        $nama_ekspedisi               = $_POST['txt_nama'];
        $alamat                       = $_POST['txt_alamat'];
        $no_telepon                   = $_POST['txt_telepon'];

        // query ubah data
        $sql    = "UPDATE tb_ekspedisi set
                    nama_ekspedisi   = '$nama_ekspedisi',
                    alamat          = '$alamat',
                    no_telepon           = '$no_telepon'
                        where id_ekspedisi = '$id_ekspedisi';
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);
        
        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil disimpan');
                    window.location.href='../../media.php?page=ekspedisi';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=ekspedisi';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi menghapus data
if($page == 'ekspedisi' AND $act == 'hapus'){
    try{
        // variabel untuk menampung nilai-nilai dari form hapus
        $id_ekspedisi = $_GET['id_ekspedisi'];

        // Query untuk menghapus data
        $sql = "DELETE FROM tb_ekspedisi 
                WHERE id_ekspedisi='$id_ekspedisi'
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);

        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil dihapus');
                    window.location.href='../../media.php?page=ekspedisi';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal dihapus');
                    window.location.href='../../media.php?page=ekspedisi';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>