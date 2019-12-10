<?php
// inicializa a sessão
session_start();

// Conexão
include_once 'php_action/db_connect.php';
include_once 'model.php';
//include 'imagens.php';
include_once 'funcionalidadesDosBotoes.php';

// Define as buscas que irão preencher os combobox

$sql1 = "SELECT * FROM Xbox";
$sql2 = "SELECT * FROM Playstation";
$rsxbox = Connect::getConnection()->query($sql1);
$rsplaystation = Connect::getConnection()->query($sql2);


if (!isset($_SESSION['xboxParaPedir']) && !isset($_SESSION['playstationParaPedir'])) {
    $_SESSION['xboxParaPedir'] = array();
    $_SESSION['playstationParaPedir'] = array();
}
?>


<html>
    <head>
    <meta name="charset" content="utf-8" />
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    
    
        <title>Compre seu jogo</title>
<style type="text/css">


body{
  margin:0;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  font-size:27px;
  color:#00ffff;
  background-color:#000000;
  line-height:1.6;
} 
.titulo-image {
  /* The image used */
  background-image: url("images/3.jpeg");

  /* Add the blur effect 
  //filter: blur(2px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 80%;
  height:60%;
  border-radius:20px;
}  
.img{
  /* The image used */
  background-image: url("images/3.jpeg");

  /* Add the blur effect 
  //filter: blur(2px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 80%;
  height:60%;
  border-radius:20px; 
}
.xbox-image {
  /* The image used */
  background-image: url("images/1.gif");

  /* Add the blur effect 
  //filter: blur(2px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 50%;
  height:200px;
  border-radius:20px;
}
.play-image {
  /* The image used */
  background-image: url("images/2.jpeg");

  /* Add the blur effect 
  //filter: blur(2px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 50%;
  height:200px;
  border-radius:20px;
}
input[type=text] {
  padding:5px; 
  border:2px solid #ccc; 
  -webkit-border-radius: 5px;
  border-radius: 5px;
}

input[type=text]:focus {
  border-color:#333;
}

input[type=submit] {
  padding:5px 15px; 
  background:#009688; 
  border:0 none;
  cursor:pointer;
  font-size:20px;
  -webkit-border-radius: 5px;
  border-radius: 5px; 
}
.customSelect select {
width: 32%;
height:5%;
border: 2px solid #00ffff;
border-radius: 5px;
background: none;
color:#00ffff;
-webkit-appearance: none;
padding: 0 10px 0 5px;
cursor: pointer;
font: 300 18px/1.5 'Roboto', sans-serif;
text-indent: 5px;
}


</style>
    <h5>
    <body onLoad="image1()">
    

        <center>   
       
        <div id="main">
                    <img src="images/3.jpeg"     id="mudaImagem" class="img">
                </div>
        <h1>Compre seu jogo</h1>
        
       
            <h2>Xbox</h2>
            <form action="index.php" method="POST" class="customSelect">
            
                <select name="xbox">
                    <?php
                    if ($rsxbox) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_row($rsxbox)) {
                            printf("<option value=%s> %s </option>", $row[0], $row[1]);
                        }
                    }
                    ?>
                </select>
                <input type="hidden" name='acao' value="adicionarXbox"/>
                <input type="submit" value="Adicionar ao carrinho"/>
  
            </form >
			
			<div class="xbox-image"></div>
            <h2>Playstation</h2>
            <form action="index.php" method="POST" class="customSelect">
                <select name="playstation">
                <?php
                    if ($rsplaystation) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_row($rsplaystation)) {
                            printf("<option value=%s> %s </option>", $row[0], $row[1]);
                        }
                    }
                    ?>
                </select>

                
                <input type="hidden" name='acao' value="adicionarPlaystation"/>
                <input type="submit" value="Adicionar ao Carrinho"/>
            </form>
            <div class="play-image"></div>

       
        
        <div>
            <h1>Jogos no carrinho</h1>
            
           
                <?php
                echo 'Existem ' . intVal(sizeof($_SESSION['xboxParaPedir']) + sizeof($_SESSION['playstationParaPedir'])) . ' jogos no pedido';
                echo '<br><br>';
                foreach ($_SESSION['xboxParaPedir'] as $x) {
                    $bun = unserialize($x);
                    echo '<div>' . $bun->produto->titulo . ' - R$' .  $bun->produto->preco . '</div>';
                }
                foreach ($_SESSION['playstationParaPedir'] as $p) {
                    $sun = unserialize($p);
                    echo '<div>' . $sun->produto->titulo . ' - R$' . $sun->produto->preco . '</div>';
                }
                ?>
         
                
            <form method='POST' action="index.php">
            <input type="hidden" name='acao' value="finalizarPedido"/>
            <input type="submit" value="Finalizar o  pedido"/>
        </form>

        <form method='POST' action="index.php">
            <input type="hidden" name='acao' value="limparOCarrinho"/>
            <input type="submit" value="Limpar o carrinho"/>
        </form>
         



        </div>

        <?php require_once 'listarPedidos.php'; ?>
            </h5>
                </center>
                <script type="text/javascript" src="trocaImg.js"></script>
    </body>
</html>