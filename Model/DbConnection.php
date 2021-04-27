<?php 
Abstract class dbh{
        private $severName;
        private $DbName;
        private $user;
        private $password;
        private $charset;

        protected function connect()
        {
        //        $this->severName = "localhost";
        //        $this->DbName = "cogip";
        //        $this->user = "root";
        //        $this->charset = "utf8mb4";
        //        $this->password= "";
               //remote connection
               $this->severName = "remotemysql.com";
               $this->DbName = "eV1HtCv73X";
               $this->user = "eV1HtCv73X";
               $this->charset = "utf8mb4";
               $this->password= "X3xC0dUfWU";

               try {
                       $dsn = "mysql:host=".$this->severName.";dbname=".$this->DbName.";charset=".$this->charset;
                       $pdo = new PDO($dsn, $this->user, $this->password );
                       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                       return $pdo;
               } 
               catch (Exception $e){
                       echo "connection failed".$e->getMessage();
                       exit();
               }

        }
        
}
