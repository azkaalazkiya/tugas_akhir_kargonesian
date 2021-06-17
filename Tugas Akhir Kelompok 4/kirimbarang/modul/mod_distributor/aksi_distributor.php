<?php
// open koneksi
include "../../config/koneksi.php";

// direct link untuk menentukan aksi
$page	= $_GET['page'];
$act	= $_GET['act'];

// Aksi menambah data
if($page == 'distributor' AND $act == 'tambah'){
    try{
        // variabel untuk menampung nilai-nilai dari form tambah
        $id_distributor                 = $_POST['txt_id'];
        $nama_distributor               = $_POST['txt_nama'];
        $alamat             = $_POST['txt_alamat'];
        $no_telepon              = $_POST['txt_telepon'];
      
        // query untuk cek apakah primary dapat digunakan
        $cek    = pg_query($koneksi,"SELECT * FROM tb_distributor WHERE id_distributor='$id_distributor'");

        // validasi primary 
        if(pg_num_rows($cek) == 0){
            // query tambah data
            $sql    =   "INSERT INTO tb_distributor
                            (id_distributor, nama_distributor, alamat, no_telepon)
                        VALUES(
                                '$id_distributor',
                                '$nama_distributor',
                                '$alamat',
                                '$no_telepon'
                            )";
            // execute query
            $query  = pg_query($koneksi,$sql);

            // query untuk cek apakah data berhasil disimpan
            $cek    = pg_query($koneksi,"SELECT * FROM tb_distributor WHERE id_distributor='$id_distributor'");
            
            // validasi apakah data berhasil disimpan
            if(pg_num_rows($cek) != 0){
                echo "
                    <script type='text/javascript'>
                        alert('Data berhasil disimpan');
                        window.location.href='../../media.php?page=distributor';
                    </script>
                ";
            }else{
                echo "
                    <script type='text/javascript'>
                        alert('Data gagal disimpan');
                        window.location.href='../../media.php?page=distributor';
                    </script>
                ";
            }
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=distributor';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi merubah data
if($page == 'distributor' AND $act == 'ubah'){
    try{
        // variabel untuk menampung nilai-nilai dari form ubah
        $id_distributor                 = $_POST['txt_id'];
        $nama_distributor               = $_POST['txt_nama'];
        $alamat             = $_POST['txt_alamat'];
        $no_telepon              = $_POST['txt_telepon'];

        // query ubah data
        $sql    = "UPDATE tb_distributor set
                    nama_distributor   = '$nama_distributor',
                    alamat          = '$alamat',
                    no_telepon           = '$no_telepon'
                        where id_distributor = '$id_distributor';
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);
        
        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil disimpan');
                    window.location.href='../../media.php?page=distributor';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal disimpan');
                    window.location.href='../../media.php?page=distributor';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// Aksi menghapus data
if($page == 'distributor' AND $act == 'hapus'){
    try{
        // variabel untuk menampung nilai-nilai dari form hapus
        $id_distributor = $_GET['id_distributor'];

        // Query untuk menghapus data
        $sql = "DELETE FROM tb_distributor 
                WHERE id_distributor='$id_distributor'
        ";

        // execute query
        $query  = pg_query($koneksi,$sql);

        // cek apakah berhasil diubah
        if($query){
            echo "
                <script type='text/javascript'>
                    alert('Data berhasil dihapus');
                    window.location.href='../../media.php?page=distributor';
                </script>
            ";
        }else{
            echo "
                <script type='text/javascript'>
                    alert('Data gagal dihapus');
                    window.location.href='../../media.php?page=distributor';
                </script>
            ";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>