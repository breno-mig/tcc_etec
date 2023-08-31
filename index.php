<?php require "conexao.php";?>
<?php require "classes/Produto.php";?>
<?php require "classes/Controle.php";?>
<?php
  $login_cookie = $_COOKIE['login'];
    if(isset($login_cookie)){
      $pagina = $_GET['pagina'] ?? 'listar';
      echo"
      <html>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <meta http-equiv='X-UA-Compatible' content='ie=edge'>
          <title>Essencial Vidros | Adm</title>
          <link rel='shortcut icon' type='image/x-icon' href='favcon_vih_icon.ico'>
          <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
        </head>
        <body>
        <div class='container mt-5'>"; 
        
        if (file_exists("paginas/" .$pagina . ".php")) {
        include "paginas/" .$pagina . ".php";
        } else {
        header("HTTP/1.0 404 Not Found");
        include "404.php";
        }
        
        echo"</div>
        </body>
        </html>";
    }else{
      echo"<script language='javascript' type='text/javascript'>
      alert('Usuario não encontrado');
      window.location.href='login.html';
      </script>";
    }
?>