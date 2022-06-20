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
              <li><a href="rezervasyon.php">Rezervasyon Oluştur</a></li>
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
        <div id="arabalarınhepsi" >
        <div id="arabaListesi" class="arabaListesi" style="margin-top: 30px;">
        <h2>Kayıtlı Rezervasyonlarım</h2>
            <table class="table mt-5 table-hover mx-auto table-striped text-center" style="width: 90%">
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">Marka</th>
                <th class="text-center">Model</th>
                <th class="text-center">Teslim alma noktası</th>
                <th class="text-center">Teslim alma tarihi</th>
                <th class="text-center">Kaç gün kiralanacak</th>
                <th class="text-center">Günlük fiyat</th>
                <th class="text-center">Ödenecek ücret</th>
                <th class="text-center">Durum</th>
            </tr>
            
            <?php 
                    if (mysqli_connect_errno()) {
                        echo "MySQL'e bağlanma hatası: " . mysqli_connect_error();
                        exit();
                    }

                    $kullaniciIdgetir = "SELECT id FROM  `kullanicilar` WHERE kullaniciadi='".$_SESSION['username']."'";
                    $result = mysqli_query($baglanti , $kullaniciIdgetir);
                    $kullaniciIdgetirSonuc = mysqli_fetch_assoc($result);

                    $sorgu = "SELECT * FROM `rezarvasyon` WHERE rezYapan='".$kullaniciIdgetirSonuc["id"]."'";
                    $sonuc = mysqli_query($baglanti , $sorgu);

                    

                    while($satir = mysqli_fetch_assoc($sonuc)){
                        $sorgufiyat = "SELECT gunlukfiyat FROM `cars` WHERE marka='".$satir["rezMarka"]."'";
                        $sonuc2 = mysqli_query($baglanti , $sorgufiyat);
                        $sorgufiyatsonuc = mysqli_fetch_assoc($sonuc2);


                        $id = $satir["rezId"];
                        $marka = $satir["rezMarka"];
                        $model = $satir["rezModel"];
                        $teslimAlmaNoktasi = $satir["rezTeslimAlmaNoktasi"];
                        $teslimAlmaTarihi = $satir["rezTeslimAlmaTarihi"];
                        $kacgun = $satir["rezKacgun"];
                        
                        echo "<tr>";
                        echo "<td>".$id."</td>";
                        echo "<td>".$marka."</td>";
                        echo "<td>".$model."</td>";
                        echo "<td>".$teslimAlmaNoktasi."</td>";
                        echo "<td>".$teslimAlmaTarihi."</td>";
                        echo "<td>".$kacgun."</td>";
                        echo "<td>".(int)$sorgufiyatsonuc["gunlukfiyat"]. "₺</td>";
                        echo "<td>".(int)$kacgun*(int)$sorgufiyatsonuc["gunlukfiyat"]." ₺</td>";
                        echo "<td> Beklemede </td>";
                        echo "</tr>";

                    }
                
                  mysqli_close($baglanti);        
                    
            ?>                  
            </table>    
        </div>
        <div id="ibra" class="conrainer text-center" style="width: 60%;">
                <h3 style="margin-bottom: 15px;">Güncel Randevu Bilgilerinizi giriniz..</h3>
                <div class="text-center">
                <?php 
                    require ('baglanti.php'); 

                    
                    if (isset($_POST['id']) && isset($_POST['marka']) && isset($_POST['model']) && isset($_POST["sehir"]) && isset($_POST["teslimAlmaTarihi"])&& isset($_POST["kacGun"]) ){ 
                                
                        extract($_POST); 


                        if($_POST["id"] === "" || $_POST["marka"] === "" ||  $_POST["model"] === "" ||  $_POST["sehir"] === "" || $_POST["teslimAlmaTarihi"] === "" || $_POST["kacGun"] === ""){
                        $message = "<h3> Lütfen tüm alanları doldurunuz...</h3>";
                        echo $message;
                        
                        
                        }
                        else{
                            $sql="UPDATE `rezarvasyon` SET rezMarka='".$marka."',rezModel='".$model."',rezTeslimAlmaNoktasi='".$sehir."',rezTeslimAlmaTarihi='".$teslimAlmaTarihi."',rezTeslimAlmaTarihi='"
                            .$teslimAlmaTarihi."',rezKacgun='".$kacGun."' WHERE rezId='".$id."'";
                            
                        $cevap = mysqli_query($baglanti, $sql); 
                            
                    
                        if ($cevap){ 
                    
                            $mesaj = "<h1>Rezervasyon güncellendi.</h1>"; 
                            header('Location: rezervasyonlarim.php'); 
                            echo $mesaj;
                    
                        }else{ 
                    
                            $mesaj = "<h1>Rezervasyon güncellenemedi!</h1>"; 
                    
                        } 
                        }

                    } 
   
                 ?> 
                </div>
                <form action="#" method="POST" class="form-group">
                    <input
                    class="form-control"
                    type="text"
                    name="id"
                    placeholder="Rezervasyon id'sini giriniz.."
                    />
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
                    <div class="text-left"><p  style="font-size: 15px;">Teslim alma tarihini giriniz..</p></div>
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
                    <input id="a" type="submit" method="POST" value="Güncelle" class="btn btn-warning btn-large "  style="padding: 15px;display: inline-block;">
                </form>
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
