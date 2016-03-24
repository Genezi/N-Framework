<?php
/**
 *
 * @author Andres Felipe Polo - <andresfpvclap@gmail.com>
 * @copyright 2016-2016 Genezi
 * @version 0.1.1
 *
 **/
abstract class AbstractModel{
    /**
     *
     * 
     **/
    private static $hostName = "localhost";
    protected $dbName = "tienda_online";
    private static $dbUser = "root";
    private static $dbPassword = "";
    private $driver = "mysql";
    private $dbPort = "3306";
    protected $lastId = 0 ;
    protected $countRows = 0;
    protected $query = "UPDATE `pedidos` SET `id_cliente`= ? ,`fecha`= ? ,`estado`= ? WHERE id_pedido = 10";
    //"INSERT INTO `pedidos`(`id_cliente`, `fecha`, `estado`)
    //VALUES (? , ? , ?)";
    //"SELECT * FROM niveles";//"INSERT INTO niveles (descripcion_nv) VALUES (1)";
    protected $rows = array();
    private $pdo;
    private $prepare;
    /**
     *
     * Establece el motor de base de datos para la conexion
     * Compatible para postgresql y mysql
     * @param String $driver nombre del motor de base de datos
     *
     **/
    protected function setDriver($driver){
        $this->driver = ($driver == "mysql" || $driver == "pgsql")?$driver:"mysql";
    }

    /**
     * Estable el nombre de la base de datos
     *
     **/
    protected function setDbName($db){
        $this->dbName = $db;
    }
    /**
     * Estable el puerto de conexion al motor de base de datos
     *
     **/
    protected function setDbPort($port){
        $this->dbPort = $port;
    }

    private function openConnect(){
        try {
            $this->pdo = new PDO(
                ''.$this->driver.':
				host='.self::$hostName.';
				port='.$this->dbPort.';
				dbname='.$this->dbName.'',
                self::$dbUser,
                self::$dbPassword
            );
        }catch(PDOException $e){
            return "Error-Connection";
        }
        return "ok";
    }

    private function closeConnect(){
        $this->pdo = null;
    }

    protected function executeQuery(){
        $msConnect = $this->openConnect();
        if($msConnect == "ok"){
            if($this->pdo->exec($this->query) > 0){
                $this->lastId = $this->pdo->lastInsertId();
            }else{
                return $this->pdo->errorInfo()[2];
            }
            $msQuery = "ok";
        }else{
            $msQuery = $msConnect;
        }
        $this->closeConnect();
        return $msQuery;
    }

    protected function prepareQuery(){
        $msConnect = $this->openConnect();
        if($msConnect == "ok"){
            $sentencia = $this->pdo->prepare($this->query);
        }else{
            return $msConnect;
        }
        $this->prepare = $sentencia;
        return "ok";
    }

    protected function executePrepareQuery(array $values){
        $this->prepare->execute($values);
    }

    protected function finishPrepare(){
        $this->closeConnect();
    }

    protected function getResultsQuery(){
        $msConnect = $this->openConnect();
        if($msConnect == "ok"){
            $results = $this->pdo->query($this->query);
            $this->countRows = $results->rowCount();
            if($results){
                while($this->rows[] = $results->fetch(PDO::FETCH_ASSOC));
            }else{
                return "Error-Query: ".$this->pdo->errorInfo()[2];
            }
            $msQuery = $this->rows;
        }else{
            $msQuery = $msConnect;
        }
        $this->closeConnect();
        return $msQuery;
    }
}
