<?php 
    //Membuat koneksi ke database
    $konek = mysqli_connect("localhost", "root", "","dborakom");

    //Membaca data dari data1
    $sql = mysqli_query($konek,"SELECT * FROM orakom ORDER BY id_data DESC ");// data terakhir diatas

    //membaca data yang teratas/ terbaru
    $data = mysqli_fetch_array($sql);
    $data1 = $data['data1'];

    //jika nilai data 1 belum ada, anggap nilai = 0
    if($data1 == "") $data1 = 0;

    //cetak nilai data1
    echo $data1 ;
?>