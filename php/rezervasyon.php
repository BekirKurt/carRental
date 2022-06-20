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
        #ibra{
            margin: 0 auto;
        }
        #ibra > form > input {
            padding: 3px;
            margin-bottom: 10px;
        }

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
              <li><a href="anasayfa.php" id="b">Ana Sayfa</a></li>
              
              <li><a href="#iletisim">İletişim</a></li>
              <li><a href="rezervasyonlarim.php">Rezervasyonlarım</a></li>
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
          <h2>Envanterde Olan Arabalar</h2>
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
            
        <div class="text-center" id="randevuOlustur">
        <div id="arabaListesi" class="arabaListesi" style="margin-top: 30px;">
        
            
            <div id="ibra" class="conrainer text-center" style="width: 60%;">
                <h3 style="margin-bottom: 15px;">Randevu Bilgilerinizi giriniz..</h3>
                <div class="text-center">
                <?php 
                    require ('baglanti.php'); 

                    
                    if (isset($_POST['marka']) && isset($_POST['model']) && isset($_POST["sehir"]) && isset($_POST["teslimAlmaTarihi"])&& isset($_POST["kacGun"]) ){ 
                                
                        extract($_POST); 


                        if($_POST["marka"] === "" ||  $_POST["model"] === "" ||  $_POST["sehir"] === "" || $_POST["teslimAlmaTarihi"] === "" || $_POST["kacGun"] === ""){
                        $message = "<h3> Lütfen tüm alanları doldurunuz...</h3>";
                        echo $message;
                        
                        
                        }
                        else{
                            $sql="INSERT INTO `rezarvasyon` (rezMarka, rezModel, rezTeslimAlmaNoktasi, rezTeslimAlmaTarihi,rezKacgun,rezYapan)";
                            $kullaniciIdgetir = "SELECT id FROM  `kullanicilar` WHERE kullaniciadi='".$_SESSION['username']."'";
                            $result = mysqli_query($baglanti , $kullaniciIdgetir);
                            $kullaniciIdgetirSonuc = mysqli_fetch_assoc($result);
                            $ibra = $kullaniciIdgetirSonuc["id"];
                    
                            $sql = $sql . "VALUES ('$marka', '$model', '$sehir', '$teslimAlmaTarihi', '$kacGun', '$ibra')";
                    
                        $cevap = mysqli_query($baglanti, $sql); 
                            
                    
                        if ($cevap){ 
                    
                            $mesaj = "<h1>Kullanıcı oluşturuldu.</h1>"; 
                            header('Location: girisYap.php'); 
                            echo $mesaj;
                    
                        }else{ 
                    
                            $mesaj = "<h1>Kullanıcı oluşturulamadı!</h1>"; 
                    
                        } 
                        }
                    }   
                    ?> 
                </div>
                    <form action="#" method="POST" class="form-group">
                        <input
                        class="form-control"
                        type="text"
                        name="marka"
                        placeholder="Markasını giriniz.."
                        />
                        <input
                        class="form-control"
                        type="text"
                        name="model"
                        placeholder="Modelini giriniz.."
                        />
                        <input
                        class="form-control"
                        type="text"
                        name="sehir"
                        placeholder="Teslim alma noktasını giriniz.."
                        />
                        <div class="text-left" ><p style="font-size: 15px;">Teslim alma tarihini giriniz..</p></div>
                        <input
                        class="form-control"
                        type="date"
                        name="teslimAlmaTarihi"
                        placeholder="Teslim alma tarihini giriniz.."
                        />
                        <input
                        class="form-control"
                        type="text"
                        name="kacGun"
                        placeholder="Kaç günlük kiralanacak"
                        />
                        
                        
                        <input id="a" type="submit" method="POST" value="Rezervasyon Oluştur" class="btn btn-warning btn-large "  style="padding: 15px;display: inline-block;">
                    </form>
            </div>
            <div class="container text-center" style="margin-top: 20px;">
                <a href="rezervasyonlarim.php">
                     <button class="btn btn-lg btn-warning mx-auto">Rezervasyonlarım</button>
                </a>
             </div>
            
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
