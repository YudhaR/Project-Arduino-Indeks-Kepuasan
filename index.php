<?php 

// Connect database

$servername = "localhost";
$username = "root";
$password = "";
$database = "dborakom";

$conn = mysqli_connect($servername, $username, $password, $database);

?>

<!-- boostrap Start -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta http-equiv="refresh" content="1"> -->
  <title>PROJECT KEPUASAN</title>
  <link rel="icon" href="asset/stonk.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <!-- Jquery -->
  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <!-- load otomatis / realtime -->
  <script type="text/javascript">
    $(document).ready(function () {
      setInterval(function () {
        $("#cekdata1").load("cek/cekdata1.php");
      }, 1000);
    });
    $(document).ready(function () {
      setInterval(function () {
        $("#cekdata2").load("cek/cekdata2.php");
      }, 1000);
    });
    $(document).ready(function () {
      setInterval(function () {
        $("#cekdata3").load("cek/cekdata3.php");
      }, 1000);
    });
  </script>

</head>

<body>
  <!-- Section Start -->
  <section id="home" class="homepage">
    <h1 class="text-center b-dark pt-5 fw-bolder">Apakah Anda Puas?</h1>
    <!-- main content Start -->
    <div class="container px-4 text-center pb-5 ">
      <div class=" row gx-5 my-5 p-3 border b-dark">
        <div class="col mt-3">
          <img src="asset/sad.png" alt="" width="250px">
          <h3 class="mt-3 p-3 border b-dark">Tidak Puas</h3>
          <h3 class="mt-3 p-2 mx-4 border b-dark"><span id="cekdata1">loading</span></h3>
        </div>
        <div class="col mt-3">
          <img src="asset/neutral.png" alt="" width="250px">
          <h3 class="mt-3 p-3 border b-dark">Cukup</h3>
          <h3 class="mt-3 p-2 mx-4 border b-dark"><span id="cekdata2">loading</span></h3>
        </div>
        <div class="col mt-3">
          <img src="asset/smile.png" alt="" width="250px">
          <h3 class="mt-3 p-3 border b-dark">Puas</h3>
          <h3 class="mt-3 p-2 mx-4 border b-dark"><span id="cekdata3">loading</span></h3>
        </div>
      </div>
    <!-- Main Content End -->

    <!-- filter Tanggal Start -->
      <!-- <div class="d-flex col-12"> -->
        <div class="wrap row text-center text-capitalize">
          <form action="" method="POST" class="row col-lg-7 col-sm-12">
                <div class="col-sm-12 col-md-12 col-lg-5 mt-3 ">
                  <td class="ps-2 ">dari tanggal</td>
                  <td class="ps-1 "><input type="date" name="dari_tgl" required="required"></td>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5 mt-3 ">
                  <td class="ps-5">sampai tanggal</td>
                  <td class="ps-1"><input type="date" name="sampai_tgl" required="required"></td>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-1 mt-3 d-flex flex-start"><input type="submit" class="btn btn-primary" name="filter" value="Filter"></div>
          </form>
          <form action="" method="POST" class="col-lg-4 col-md-12 col-sm-12 d-flex flex-start">
            <input type="submit" class="btn btn-primary mx-1 col-sm-12 col-md-6 col-lg-3 mt-3 px-4" name="all" value="All">
          </form>
        </div>
    <!-- Filter Tanggal End -->

    <!-- Tabel Start -->
      <div class="mt-2">
        <table class="table table-secondary	 table-striped text-capitalize" name="number_of_rows" id="table_id">
          <tr class="table-dark">
            <th scope="col">no</th>
            <th scope="col">tangal</th>
            <th scope="col">tidak puas</th>
            <th scope="col">cukup</th>
            <th scope="col">puas</th>
          </tr>
          </thead>
          <tbody>
            <!-- filter Start -->
            <?php $i = 1; 
            if(isset($_POST['filter'])){
              $dari_tgl = mysqli_real_escape_string($conn,$_POST['dari_tgl']);
              $sampai_tgl = mysqli_real_escape_string($conn,$_POST['sampai_tgl']);
              
              $kartu = mysqli_query ($conn,"SELECT * FROM orakom WHERE date BETWEEN '$dari_tgl' AND '$sampai_tgl' ORDER BY id_data DESC") ;
            } else {
              $kartu = mysqli_query($conn,"SELECT * FROM orakom ORDER BY id_data DESC");
            } 
            if(isset($_POST['all'])){
              $kartu = mysqli_query($conn,"SELECT * FROM orakom ORDER BY id_data DESC");
              
            }
          ?>
          <!-- filter end -->

          <!-- data tabel start -->
            <?php foreach ( $kartu as $data ) :{
                }  ?>
            <tr>
              <td>
                <?= $i; ?>
              </td>
              <td>
                <?= $data["date"]; ?>
              </td>
              <td>
                <?= $data["data1"]; ?>
              </td>
              <td>
                <?= $data["data2"]; ?>
              </td>
              <td>
                <?= $data["data3"]; ?>
              </td>
            </tr>
            <?php $i++;  ?>
            <?php endforeach; ?>
          <!-- data tabel end -->
          </tbody>
        </table>
        <!-- Tabel End -->

        <!-- button Page Start -->
        <div class="btn-group">
          <button class="button" id="btn_prev" onclick="prevPage()">Prev</button>
          <button class="button" id="btn_next" onclick="nextPage()">Next</button>
          <div
            style="display: inline-block; position:relative; border: 0px solid #e3e3e3; float: center; margin-left: 2px;;">
            <p style="position:relative; font-size: 14px;"> Table : <span id="page"></span></p>
          </div>
          <select name="number_of_rows" id="number_of_rows">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          <button class="button" id="btn_apply" onclick="apply_Number_of_Rows()">Apply</button>
        </div>
        <!-- button Page End -->

  </section>
<!-- Section End -->

<!-- Javascript Start -->
  <script>
    
    // Page Default Start
    var current_page = 1;
    var records_per_page = 10;
    var l = document.getElementById("table_id").rows.length
    //Page Default End

    //Function Baris Start
    function apply_Number_of_Rows() {
      var x = document.getElementById("number_of_rows").value;
      records_per_page = x;
      changePage(current_page);
    }
    //Function Baris End

    //Function PrevPage Start
    function prevPage() {
      if (current_page > 1) {
        current_page--;
        changePage(current_page);
      }
    }
    //Function PrevPage End

    //Function NextPage Start
    function nextPage() {
      if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
      }
    }
    //Function NextPage End

    //Function ganti page Start
    function changePage(page) {
      var btn_next = document.getElementById("btn_next");
      var btn_prev = document.getElementById("btn_prev");
      var listing_table = document.getElementById("table_id");
      var page_span = document.getElementById("page");

      // Validate page
      if (page < 1) page = 1;
      if (page > numPages()) page = numPages();

      [...listing_table.getElementsByTagName('tr')].forEach((tr) => {
        tr.style.display = 'none'; // reset all to not display
      });
      listing_table.rows[0].style.display = ""; // display the title row

      for (var i = (page - 1) * records_per_page + 1; i < (page * records_per_page) + 1; i++) {
        if (listing_table.rows[i]) {
          listing_table.rows[i].style.display = ""
        } else {
          continue;
        }
      }

      page_span.innerHTML = page + "/" + numPages() + " (Total Number of Rows = " + (l - 1) + ") | Number of Rows : ";

      if (page == 0 && numPages() == 0) {
        btn_prev.disabled = true;
        btn_next.disabled = true;
        return;
      }

      if (page == 1) {
        btn_prev.disabled = true;
      } else {
        btn_prev.disabled = false;
      }

      if (page == numPages()) {
        btn_next.disabled = true;
      } else {
        btn_next.disabled = false;
      }
    }
    //Function ganti page End

    //Function Nomor Page Start
    function numPages() {
      return Math.ceil((l - 1) / records_per_page);
    }
    //Function Nomor Page End

    //Function ganti page Start
    window.onload = function () {
      var x = document.getElementById("number_of_rows").value;
      records_per_page = x;
      changePage(current_page);
    };
      //Function ganti page End
  </script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
    <!-- Javascript End -->
</body>

</html>

<!-- Bootstrap End -->