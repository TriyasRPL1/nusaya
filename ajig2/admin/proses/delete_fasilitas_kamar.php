<?php
 include "../../includes/koneksi.php"; 
    $id   = $_POST['idp'];
    
  
    $sql = "select * from tb_fasilitas_kamar where id='$id'";
    $result = $conn->query($sql);
     if ($result->num_rows > 0 ) {
     $row = $result->fetch_assoc();
       
         unlink('../../'.$row['gambar']);
     }
     $sql = "DELETE FROM tb_fasilitas_kamar WHERE id = '$id'";        
            if ($conn->query($sql)==1)
            {
             $data = "OK";
             echo $data;
		    }
		    else{
            $data = "ERROR";
            echo $data;
        }
?>