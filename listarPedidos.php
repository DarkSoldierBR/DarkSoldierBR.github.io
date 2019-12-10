
<?php include_once 'model.php';

$p = new Pedido();
$arrayDePedidos = $p->todosPedidos();
?>
<style>
table, td, th {  
  border: 1px solid #009688 ;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
<h2>Pedidos realizados</h2>


<table border='1'>
    <tr>
        <th>ID</th>
        <th>Jogos comprado</th>
        <th>Preço final</th>
    </tr>
    <?php
    foreach ($arrayDePedidos as $peds) {
        ?>                    
        <tr>
            <td><?= $peds->idPedido ?></td>
            <td>
                <?php
                if (!empty($peds->playstation)) {
                    foreach ($peds->playstation as $play) {
                        echo '<div>' . $play->produto->titulo .'</div>';
                    }
                }
                if (!empty($peds->xbox)) {
                    foreach ($peds->xbox as $xbox) {
                        echo '<div>'.  $xbox->produto->titulo .'</div>';
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $acumula = 0;
                if (!empty($peds->playstation)) {
                    foreach ($peds->playstation as $play) {
                        $acumula = $acumula +  floatval($play->produto->preco);
                    }
                }
                if (!empty($peds->xbox)) {
                    foreach ($peds->xbox as $xbox) {
                        $acumula = $acumula +  floatval($xbox->produto->preco);
                    }
                }
                echo '<p>R$' . $acumula . '</p>';
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>