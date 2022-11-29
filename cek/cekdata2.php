<?php 
    //Membuat koneksi ke database
    $konek = mysqli_connect("localhost", "root", "","dborakom");

    //Membaca data dari data2
    $sql = mysqli_query($konek,"SELECT * FROM orakom ORDER BY id_data DESC ");// data terakhir diatas

    //membaca data yang teratas/ terbaru
    $data = mysqli_fetch_array($sql);
    $data2 = $data['data2'];

    //jika nilai data 2 belum ada, anggap nilai = 0
    if($data2 == "") $data2 = 0;

    //cetak nilai data2
    echo $data2 ;
?>