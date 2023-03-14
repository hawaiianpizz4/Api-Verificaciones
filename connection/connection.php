<?php  
    class Conectar{
        protected $dbh;
        protected function Conexion(){
            try{
                $conectar=$this->dbh= new PDO("mysql:host=210.17.1.100;port=3306;dbname=ventaspdv_verificaciones","procesos_web","oBkA4^824obj");
                return $conectar;
            }catch(Exception $e){
                print "!Error BD! : ". $e->getMessage()."<br/>";
                die();
            }
        }
        public function set_names(){
            return $this->dbh->query("Set Names 'utf8'");
        }
    }
?>