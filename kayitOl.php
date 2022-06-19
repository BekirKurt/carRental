<?php 
   require ('baglanti.php'); 
   
   if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST["email"])){ 
   
    extract($_POST);  

    if($_POST["username"] === "" || $_POST["password"] === "" || $_POST["email"] === ""){
      $message = "<h1> Lütfen tüm alanları doldurunuz...</h1>";
      echo $message;
    }
    else{
        $sql="INSERT INTO `kullanicilar` (kullaniciadi, sifre, eposta)"; 
   
        $sql = $sql . "VALUES ('$username', '$password', '$email')"; 
   
        
   
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
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
            height: 65%;
            width: 40%;
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
        } @media only screen and (max-width: 1000px) {
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
        <h1 class="lead" style="font-size: 40px;">Kayıt Ol</h1>
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
            <input
              class="form-control"
              type="text"
              name="email"
              placeholder="E-mailinizi giriniz.."
            />
            <input type="submit" value="Kayıt Ol"  class="btn btn-info btn-large " style="width: 50%;">
            
          </form>
          <a class="w-50" href="girisYap.php"
            ><button class="btn btn-info btn-large" style="width: 50%;">
              Giriş Yap
            </button></a
          >
          <a class="w-50" href="anasayfa.php"
            ><button class="btn btn-info btn-large" style="width: 50%;margin-top: 15px;">
              Ana Sayfa
            </button></a
          >
    </div>
</body>
</html> 
