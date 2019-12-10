<?php

include_once 'php_action/db_connect.php';

// Define as classes usadas no projeto (refletem o banco de dados)


class Item {

    public $produto;
    public $quantidade;

}

class Pedido {

    public $idPedido;
    public $playstation;
    public $xbox;

    public function todosPedidos() {

        $sqlListarPedidos = "Select * from Pedido";
        $pedidos = Connect::getConnection()->query($sqlListarPedidos);
        

        // Popula o array de pedidos
        $arrayDePedidos = array();
        while ($row = mysqli_fetch_row($pedidos)) {
            $pedido = new Pedido();
            $pedido->idPedido = $row[0];
            $arrayDeXbox = array();
            $arrayDePlaystation = array();

            $sqlListarXboxDoPedido = "SELECT * FROM Pedido_has_Xbox WHERE idPedido = $pedido->idPedido";
            $intermediariaXbox = Connect::getConnection()->query($sqlListarXboxDoPedido);

            while ($intbeb = mysqli_fetch_row($intermediariaXbox)) {
                $objBeb = new Xbox();
                $objBeb->idXbox = $intbeb[1];
                $objBeb->xboxById();
                $itemPed = new Item();
                $itemPed->produto = $objBeb;
                $itemPed->preco = $intbeb[2];
                array_push($arrayDeXbox, $itemPed);
            }
            $pedido->xbox = $arrayDeXbox;

           // $test=$pedido->idPedido;
           // echo "oq é". $test;
            $sqlListarPlaystationDoPedido = "SELECT * FROM Pedido_has_Playstation WHERE idPedido = $pedido->idPedido";
            $intermediariaPlaystation = Connect::getConnection()->query($sqlListarPlaystationDoPedido);

            while ($intsal = mysqli_fetch_row($intermediariaPlaystation)) {
                $objSal = new Playstation();
                $objSal->idPlaystation = $intsal[1];
                $objSal->playstationById();
                
                $itemPed = new Item();
                $itemPed->produto = $objSal;
            //    $itemPed->quantidade = $intsal[2];
                array_push($arrayDePlaystation, $itemPed);
            }
            $pedido->playstation = $arrayDePlaystation;
            array_push($arrayDePedidos, $pedido);
        }
        return $arrayDePedidos;
    }

}

class Xbox {

    public $idXbox;
    public $titulo;
    public $genero;
    public $preco;

    function xboxById() {
        $sqlXbox = "SELECT * FROM Xbox where idXbox = " . $this->idXbox;
        $resultado = Connect::getConnection()->query($sqlXbox);

        if ($resultado) {

            while ($beb = mysqli_fetch_row($resultado)) {
                $this->idXbox = $beb[0];
                $this->titulo = $beb[1];
                $this->genero = $beb[2];
                $this->preco = $beb[3];
            }
        }
    }

}

class Playstation {

    public $idPlaystation;
    public $titulo;
    public $genero;
    public $preco;

    function playstationById() {
        $sqlPlaystation = "SELECT * FROM Playstation where idPlaystation = " . $this->idPlaystation;
        $resultado = Connect::getConnection()->query($sqlPlaystation);

        if ($resultado) {
            while ($sal = mysqli_fetch_row($resultado)) {
                $this->idPlaystation = $sal[0];
                $this->titulo = $sal[1];
                $this->genero = $sal[2];
                $this->preco = $sal[3];
            }
        }
    }

}
