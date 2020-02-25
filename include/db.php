<?php
    class DATABASE{
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'library';
        function connect(){
            return new mysqli($this->host, $this->username, $this->password, $this->dbname);
        }
    }
?>