<?php 
   session_start(); 
   
   require('baglanti.php'); 
   
   if (isset($_POST['username']) and isset($_POST['password'])){ 
   
          extract($_POST); 
          
          $sql = "SELECT * FROM `kullanicilar` WHERE "; 
          $sql= $sql . "kullaniciadi='$username' and sifre='$password'"; 
          
          $cevap = mysqli_query($baglanti, $sql); 
        
          if(!$cevap ){ 
              echo '<br>Hata:' . mysqli_error($baglanti); 
          } 
          
          $say = mysqli_num_rows($cevap); 
          
          if ($say == 1){ 
              $_SESSION['username'] = $username; 
            }else{
          $mesaj = "<h1>Kullanıcı adı veya şifreniz yanlış...</h1>"; 
          echo $mesaj;
          
          } 
      } 
      if (isset($_SESSION['username'])){ 
      header("Location: anasayfa.php"); 
      }
   else{ 
   ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            text-align: center;
            background-color: #EFEFEF;
        }
        .girisEkrani{
            height: 60%;
            width: 35%;
            padding: 10px;
            border-radius: 10px;
            border: 2px solid black;
            background-color: #DDDDDD;
            text-align: center;
        }
        .form-group{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .form-group > input{
            width: 75%;
            padding: 10px;
            margin: 10px 0;
        }
        @media only screen and (max-width: 1000px) {
             body{
               width: 100vw;
             }
             .girisEkrani{
               width: 70vw;
             }           
        }
       
        @media only screen and (max-width: 600px) {
             body{
               width: 100vw;
             }
             .girisEkrani{
               width: 90vw;
             }    
             .girisEkrani > form > #a {
               width: 50vw;
             }
             .girisEkrani > a {
               width: 75vw;
             }       
        }
        
    </style>
</head>
<body>
    <div class="girisEkrani">
        <h1 class="lead" style="font-size: 40px;">Giriş Yap</h1>
        <form action="#" method="POST" class="form-group">
            <input
              class="form-control"
              type="text"
              name="username"
              placeholder="Kullanıcı adını giriniz.."
            />
            <input
              class="form-control"
              type="password"
              name="password"
              placeholder="Parolanızı giriniz.."
            />
            
            <input id="a" type="submit" method="POST" value="Giriş Yap" class="btn btn-info btn-large "  style="width: 50%;">
          </form>
          <a class="w-50" href="kayitOl.php"
            ><button class="btn btn-info btn-large" style="width: 50%;">
              Kayıt Ol
            </button></a
          >
          <a class="w-50" href="index.html"
            ><button class="btn btn-info btn-large" style="width: 50%;margin-top: 15px;">
              Ana Sayfa
            </button></a
          >
    </div>
</body>
</html>
<?php 
} 
?>