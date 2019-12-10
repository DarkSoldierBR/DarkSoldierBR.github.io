<?php



error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Conexão com banco de dados

class Connect {

    static $connect;

    public static function getConnection() {
        if (self::$connect == null) {
            $servername = "localhost";
            $username = "root";
            $password = "1234";
            $db_name = "db_lojagames";

            self::$connect = new mysqli($servername, $username, $password, $db_name);

            if (mysqli_connect_error()):
                echo "Erro na conexão: " . mysqli_connect_error();
            endif;
        }
        return self::$connect;
    }

}
