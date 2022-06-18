<?php 
   session_start();  
   if ( !isset($_SESSION['username']) ) { 
     header("Location: girisYap.php");
     exit(); 
    } 
?> 
<?php 
include ("baglanti.php"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Rental</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <style>
        @media only screen and (max-width: 770px) {
              
              .jumbotron{
                margin-top: 260px;
              }
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="navbar">
        <nav class="container navbar navbar-default bg-dark navbar-fixed-top">
          <div id="ibra" class="container-fluid">
            <ul class="nav navbar-nav">
              <li id="brand">CAR RENTAL</li>
              <li><a href="#" id="b">Ana Sayfa</a></li>
              <li><a href="#cards">Öne Çıkanlar</a></li>
              <li><a href="rezervasyon.php">Rezervasyon Oluştur</a></li>
              <li><a href="rezervasyonlarim.php">Rezervasyonlarım</a></li>
              <li><a href="#iletisim">İletişim</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li style="padding-top: 16px;font-weight: 700; padding-left: 15px;">
                  <?php 
                        echo "Hoşgeldiniz" . "   ". "<span style='color:red;'>". $_SESSION['username'] . "</span>";
                  ?>
              </li>
              <li><a href="cikisYap.php">Çıkış Yap</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="jumbotron text-center" >
          <div
            id="slider"
            class="carousel slide"
            data-ride="carousel"
            style="display: inline-block"
          >
            <div class="carousel-inner">
              <div class="item">
                <img src="images/BMW_3.18i.jpg" style="width: 40vw" />
              </div>
              <div class="item active">
                <img src="images/BMW_3.18i.jpg" style="width: 40vw" />
              </div>

              <div class="item">
                <img src="images/dacia_duster.jpg" style="width: 40vw" />
              </div>
              <div class="item">
                <img src="images/Peugeot_208.jpg" style="width: 40vw" />
              </div>
              <div class="item">
                <img src="images/kia-sportage.jpg" style="width: 40vw" />
              </div>
              <div class="item">
                <img src="images/peugeot-301.jpg" style="width: 40vw" />
              </div>
            </div>

            <a href="#slider" class="left carousel-control" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only"></span>
            </a>
            <a href="#slider" class="right carousel-control" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only"></span>
            </a>
          </div>
           <h2>
              <b>Öne çıkan kiralık arabalar</b>
           </h2>
          <p>
          Sunulan satın alma veya hizmetin, güven oluşturmak ve gelecekteki satışlarımızda bizlere güvendiğiniz
            müşterilerimize teşekkür ederiz. <br />
           <br /> Siz değerli müşterilerimize hizmet vermekten mutluluk duyarız. 
          </p>
          <a href="rezervasyon.php">
          <button type="button" class="btn btn-lg btn-success" >
          Hemen kiralamak için tıklayınız
          </button></a>
        </div>
      <div id="cards" class="cards text-center">
        <h1 class="lead text-center" style="font-size: 45px">
          Envanterde bulunan bazı arabalar
        </h1>
        <div class="row">
          <div class="column col-sm-4">
            <img src="images/BMW_3.18i.jpg" alt="bmw 3.18i" width="80%" /><br />
            <div class="text-center" style="text-align: center">
              <table class="table mt-5 table-hover mx-auto" style="width: 80%">
                <tr>
                  <td></td>
                  <td><b>BMW 3.18i</b></td>
                </tr>
                <tr>
                  <td><b>Vites</b></td>
                  <td>Manuel</td>
                </tr>
                <tr>
                  <td><b>Yakıt</b></td>
                  <td>Benzin</td>
                </tr>
                <tr>
                  <td><b>Model</b></td>
                  <td>2019</td>
                </tr>
                <tr>
                  <td><b>Renk</b></td>
                  <td>Beyaz - Siyah</td>
                </tr>
                <tr>
                  <td><b>Günlük fiyat</b></td>
                  <td>1500 ₺</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="column col-sm-4">
            <img
              src="images/dacia_duster.jpg"
              alt="dacia duster"
              width="80%"
            /><br />
            <div class="text-center" style="text-align: center">
              <table class="table mt-5 table-hover mx-auto" style="width: 80%">
                <tr>
                  <td></td>
                  <td><b>Dacia Duster</b></td>
                </tr>
                <tr>
                  <td><b>Vites</b></td>
                  <td>Manuel</td>
                </tr>
                <tr>
                  <td><b>Yakıt</b></td>
                  <td>Benzin</td>
                </tr>
                <tr>
                  <td><b>Model</b></td>
                  <td>2020</td>
                </tr>
                <tr>
                  <td><b>Renk</b></td>
                  <td>Mavi - Siyah</td>
                </tr>
                <tr>
                  <td><b>Günlük fiyat</b></td>
                  <td>700 ₺</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="column col-sm-4">
            <img
              src="images/scoda-fabia.jpg"
              alt="scoda fabia"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>Scoda Fabia</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Otomatik</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Benzin</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2019</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Beyaz - Siyah</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>600 ₺</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="column col-sm-6">
            <img
              src="images/Peugeot_208.jpg"
              alt="peugeot 208"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>Peugeot 208</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Manuel</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Dizel</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2020</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Beyaz - Gri - Siyah</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>750 ₺</td>
              </tr>
            </table>
          </div>
          <div class="column col-sm-6">
            <img
              src="images/kia-sportage.jpg"
              alt="kia sportage"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>Kia Sportage</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Otomatik</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Benzin</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2019</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Metalik Mavi - Siyah</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>700 ₺</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="column col-sm-4">
            <img
              src="images/wolkswagen_polo.jpg"
              alt="wolkswagen polo"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>wolkswagen Polo</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Manuel</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Benzin</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2019</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Kırmızı - Beyaz - Siyah</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>500 ₺</td>
              </tr>
            </table>
          </div>
          <div class="column col-sm-4">
            <img
              src="images/mercedes-cla.jpg"
              alt="mercedes cla"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>Mercedes Cla</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Otomatik</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Dizel</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2016</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Gri - Siyah</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>900 ₺</td>
              </tr>
            </table>
          </div>
          <div class="column col-sm-4">
            <img
              src="images/renault-clio.jpg"
              alt="renault clio"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>Renault Clio</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Otomatik</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Benzin</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2020</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Kırmızı - Beyaz</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>400 ₺</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="column col-sm-6">
            <img
              src="images/peugeot-301.jpg"
              alt="peugeot 301"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>Peugeot 301</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Manuel</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Dizel</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2019</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Siyah - Gri - Beyaz</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>500 ₺</td>
              </tr>
            </table>
          </div>
          <div class="column col-sm-6">
            <img
              src="images/dacia-sandero-stepw.jpg"
              alt="hundai i20"
              width="80%"
            /><br />
            <table class="table mt-5 table-hover mx-auto" style="width: 80%">
              <tr>
                <td></td>
                <td><b>Dacia Sandero Stepw</b></td>
              </tr>
              <tr>
                <td><b>Vites</b></td>
                <td>Otomatik</td>
              </tr>
              <tr>
                <td><b>Yakıt</b></td>
                <td>Dizel</td>
              </tr>
              <tr>
                <td><b>Model</b></td>
                <td>2018</td>
              </tr>
              <tr>
                <td><b>Renk</b></td>
                <td>Beyaz - Gri - Siyah</td>
              </tr>
              <tr>
                <td><b>Günlük fiyat</b></td>
                <td>500 ₺</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="container text-center" style="margin-top: 70px;">
            <button class="btn btn-lg btn-warning mx-auto" onclick="getElementById('arabalarınhepsi').style.display='block'">Arabalari Listele</button>
        </div>
        <div id="arabalarınhepsi" style="display: none;">
        <div id="arabaListesi" class="arabaListesi" style="margin-top: 30px;">
            <table class="table mt-5 table-hover mx-auto table-striped text-center" style="width: 80%">
            <tr>
                <th class="text-center">Marka</th>
                <th class="text-center">Model</th>
                <th class="text-center">Yakıt</th>
                <th class="text-center">Kalan Adet</th>
                <th class="text-center">Günlük Fiyatı (₺)</th>
            </tr>
            
            <?php 
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                    }

                    $sorgu = "SELECT * FROM cars";
                    $sonuc = mysqli_query($baglanti , $sorgu);

                    while($satir = mysqli_fetch_assoc($sonuc)){

                        $marka = $satir["marka"];
                        $model = $satir["model"];
                        $yakit = $satir["yakit"];
                        $kalanAdet = $satir["kalanAdet"];
                        $gunlukfiyat = $satir["gunlukfiyat"];
                        
                        echo "<tr>";
                        echo "<td>".$marka."</td>";
                        echo "<td>".$model."</td>";
                        echo "<td>".$yakit."</td>";
                        echo "<td>".$kalanAdet."</td>";
                        echo "<td>".$gunlukfiyat."</td>";
                        echo "</tr>";

                    }
                
                  mysqli_close($baglanti);
                    
            ?>
      
            </table>
        </div>
      </div>
      <div id="iletisim" class="footer text-center lead" style="margin-bottom: 50px;">
        <h2 style="border-bottom:5px;">Bekir KURT</h2>
        <span style="font-size: 18px;margin-bottom: 8px;margin-bottom: 8px; padding: 5px; border-right: 1px solid black;margin-right: 10px;"> <b> Mail </b></span>
        <span>bekiribra111@gmail.com</span><br>
        <div style="display: flex;width: 50%; margin: 0 auto; justify-content: space-around; margin-top: 10px;">
            <a href="https://github.com/BekirKurt" target="_blank">GitHub</a><br>
            <a href="https://github.com/BekirKurt" target="_blank">GitHub Repo</a><br />
            <a href="https://www.linkedin.com/in/bekir-kurt-377980193/" target="_blank">LinkedIn</a><br />
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
