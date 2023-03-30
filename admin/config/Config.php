<?php
    class Config{
        protected $con;
        function __construct()
        {
            // define("HOSTNAME","localhost");
            // define("USERNAME","root");
            // define("PASSWORD","");
            // define("DB","db_palki");
            $this->con = new Mysqli("localhost","root","","db_palki");
        }
    }
?>