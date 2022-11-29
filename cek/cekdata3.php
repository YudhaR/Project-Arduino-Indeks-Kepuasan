<?php 
    //Membuat koneksi ke database
    $konek = mysqli_connect("localhost", "root", "","dborakom");

    //Membaca data dari data3
    $sql = mysqli_query($konek,"SELECT * FROM orakom ORDER BY id_data DESC ");// data terakhir diatas

    //membaca data yang teratas/ terbaru
    $data = mysqli_fetch_array($sql);
    $data3 = $data['data3'];

    //jika nilai data 3 belum ada, anggap nilai = 0
    if($data3 == "") $data3 = 0;

    //cetak nilai data3
    echo $data3 ;
?>