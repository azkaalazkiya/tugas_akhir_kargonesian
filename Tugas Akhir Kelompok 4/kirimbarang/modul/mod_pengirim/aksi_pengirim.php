<?php
// open koneksi
include "../../config/koneksi.php";

// direct link untuk menentukan aksi
$page	= $_GET['page'];
$act	= $_GET['act'];

// Aksi menambah data
if($page == 'pengirim' AND $act == 'tambah'){
    try{
        // variabel untuk menampung nilai-nilai dari form tambah
        $id_pelanggan                 = $_POST['txt_id'];
        $nama_pelanggan               = $_POST['txt_nama'];
        $alamat             = $_POST['txt_alamat'];
        $no_telepon              = $_POST['txt_telepon'];
      
        // query untuk cek apakah primary dapat digunakan
        $cek    = pg_query($koneksi,"SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");

        // validasi primary 
        if(pg_num_rows($cek) == 0){
            // query tambah data
            $sql    =   "INSERT INTO tb_pelanggan
                            (id_pelanggan, nama_pelanggan, alamat, no_telepon)
                        VALUES(
                                '$id_pelanggan',
                                '$nama_pelanggan',
                                '$alamat',
                                '$no_telepon'
                            )";
            // execute query
            $query  = pg_query($koneksi,$sql);

            // query untuk cek apakah data berhasil disimpan
            $cek    = pg_query($koneksi,"SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
            
            // validasi apakah data berhasil disimpan
            if(pg_num_rows($cek) != 0){
                echo "
                    <script type='text/javascript'>
                        alert('Data berhasil disimpan');
                        window.location.href='../../media.php?page=pengirim';
                    </script>
                ";
            }else{
                echo "
                    <script type='text/javascript'>
                        alert('Data gagal disimpan');
                        window.location.href='../../media.php?page=pengirim';
                    </script>
                ";
            }
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=pengirim';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi merubah data
if($page == 'pengirim' AND $act == 'ubah'){
    try{
        // variabel untuk menampung nilai-nilai dari form ubah
        $id_pelanggan                 = $_POST['txt_id_pelanggan'];
        $nama_pelanggan               = $_POST['txt_nama_pelanggan'];
        $alamat             = $_POST['txt_alamat'];
        $no_telepon              = $_POST['txt_no_telepon'];

        // query ubah data
        $sql    = "UPDATE tb_pelanggan set
                    nama_pelanggan   = '$nama_pelanggan',
                    alamat          = '$alamat',
                    no_telepon           = '$no_telepon'
                        where id_pelanggan = '$id_pelanggan';
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);
        
        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil disimpan');
                    window.location.href='../../media.php?page=pengirim';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=pengirim';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi menghapus data
if($page == 'pengirim' AND $act == 'hapus'){
    try{
        // variabel untuk menampung nilai-nilai dari form hapus
        $id_pelanggan = $_GET['id'];

        // Query untuk menghapus data
        $sql = "DELETE FROM tb_pelanggan 
                WHERE id_pelanggan='$id_pelanggan'
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);

        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil dihapus');
                    window.location.href='../../media.php?page=pengirim';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal dihapus');
                    window.location.href='../../media.php?page=pengirim';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>