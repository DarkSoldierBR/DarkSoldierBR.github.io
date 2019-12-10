<?php

// define o que acontece quando clicamos em adicionar ao carrinho

include_once 'model.php';

function adicionarXbox($xboxParaAdicionar) {
    $toAdd = new Xbox();
    $toAdd->idXbox = $xboxParaAdicionar;
    $toAdd->xboxById();
    $item = new Item();
    $item->produto = $toAdd;
    $bgp = $_SESSION['xboxParaPedir'];
    array_push($bgp, serialize($item));
    $_SESSION['xboxParaPedir'] = $bgp;
}
function adicionarPlaystation($playstationParaAdicionar) {
    $toAdd = new Playstation();
    $toAdd->idPlaystation = $playstationParaAdicionar;
    $toAdd->playstationById();
    $item = new Item();
    $item->produto = $toAdd;
  //  $item->preco = $preco;
    $bgp = $_SESSION['playstationParaPedir'];
    array_push($bgp, serialize($item));
    $_SESSION['playstationParaPedir'] = $bgp;
}

if (isset($_POST['acao']) && $_POST['acao'] == 'adicionarXbox') {
    if (isset($_POST['xbox'])) {
        adicionarXbox($_POST['xbox']);
    }
}
if (isset($_POST['acao']) && $_POST['acao'] == 'adicionarPlaystation') {
    if (isset($_POST['playstation'])) {
        adicionarPlaystation($_POST['playstation']);
    }
}


//limpa o carrinho



if (isset($_POST['acao']) && $_POST['acao'] == 'limparOCarrinho') {
    limparCarrinho();
}

function limparCarrinho() {
    $_SESSION['xboxParaPedir'] = array();
    $_SESSION['playstationParaPedir'] = array();
}
// define o que acontece quando clicamos em finalizarpedido


if (isset($_POST['acao']) && $_POST['acao'] == 'finalizarPedido') {
    finalizarPedido();
}

function finalizarPedido() {

    $query = "INSERT INTO Pedido VALUES ()";
    Connect::getConnection()->query($query);

   // $idPedido = Connect::getConnection()->insert_id;

    foreach ($_SESSION['xboxParaPedir'] as $xboxParaPedir) {
        $bun = unserialize($xboxParaPedir);
        $idXbox = $bun->produto->idXbox;
        $precoXbox = $bun->produto->preco;
        //echo "id xbox = ".$idXbox;
        //echo "preco xbox = ".$precoXbox;
        $insertXbox = "INSERT INTO `db_lojagames`.`Pedido_has_Xbox` (`idXbox`, `Preco`) VALUES ('$idXbox', '$precoXbox');";
        Connect::getConnection()->query($insertXbox);

    
    }
      foreach ($_SESSION['playstationParaPedir'] as $playParaPedir) {
        $sun = unserialize($playParaPedir);
        $idPlaystation = 0;
        $precoPlaystation = 0;
        $idPlaystation = $sun->produto->idPlaystation;
        $precoPlaystation = $sun->produto->preco;
       // echo "id Playstation = ".$idPlaystation;
       // echo "preco Playstation = ".$precoPlaystation;
        $insertPlaystation = "INSERT INTO `db_lojagames`.`Pedido_has_Playstation` (`idPlaystation`, `Preco`) VALUES ('$idPlaystation', '$precoPlaystation');";
        Connect::getConnection()->query($insertPlaystation);
    }
}

