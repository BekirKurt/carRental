<?php 
   //oturumu başlat 
   session_start(); 
   
   //eğer username adlı oturum değişkeni yok ise    
   //login sayfasına yönlendir 
   
   if ( !isset($_SESSION['username']) ) { 
   
     header("Location: girisYap.php");
     exit(); 
    } 
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
       #rezervasyon{
           text-align: center;
           margin: 0 auto;
       }
       #rezervasyon > input {
           padding: 5px;
           margin: 10px 0;
       }
       
      @media only screen and (max-width: 770px) {
              
              .jumbotron{
                margin-top: 220px;
              }
              #rezervasyon{
                  width: 90vw;
              }
        }
        @media only screen and (max-width: 450px) {
              #rez{
                width: 100vw;
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
      </div >
       <div>
           
<?php 

require('baglanti.php');

echo "becker";
if (isset($_POST['marka']) && isset($_POST['model']) && isset($_POST["sehir"])&& isset($_POST["teslimAlmaTarih"])  
    && isset($_POST["teslimEtmeTarih"])&&  isset($_POST["kacGun"])
    ){ 

extract($_POST); 


if($_POST["marka"] === "" || $_POST["model"] === "" || $_POST["sehir"] === "" || $_POST["teslimAlmaTarih"] === "" 
    || $_POST["teslimEtmeTarih"] === ""|| $_POST["kacGun"] === ""){
  $message = "<h1> Lütfen tüm alanları doldurunuz...</h1>";
  echo $message;
  
  
}
else{
    $message = "<h1> Arelefavela...</h1>";
    $sql="INSERT INTO `rezervasyon` (rezMarka, rezModel, rezTeslimAlmaNoktasi , rezTeslimAlmaTarihi , rezTeslimEtmeTarihi ,rezKacgun)"; 

    $sql = $sql . "VALUES ('$marka', '$model', '$sehir', '$teslimAlmaTarih', '$teslimEtmeTarih', '$kacGun')"; 

        

    $cevap = mysqli_query($baglanti, $sql); 

    if ($cevap){ 

        $mesaj = "<h1>Kullanıcı oluşturuldu.</h1>"; 
        header('Location: anasayfa.php'); 
        echo $mesaj;

    }else{ 

        $mesaj = "<h1>Kullanıcı oluşturulamadı!</h1>"; 

    } 
}
    



}else{
   echo "<h1>Bir sorunla karşılaşıldı</h1>";
}

?> 
       </div>
      
      
       <div id="iletisim" class="footer text-center lead">
        <h2>Bekir KURT</h2>
        
        <h4>Github</h4>
        <p>Lorem ipsum dolor sit amet.</p>
        <h4>LinkedIn</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur.
        </p>
        <h4>
          mail
        </h4>
        <p>bekiribra111@gmail.com</p>
      </div>
        </div>

          
    </div>
    <script src="script.js"></script>
  </body>
</html>