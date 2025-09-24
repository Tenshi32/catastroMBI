<?php

class baseData{

    public static function conexion() {
        try{
            $dbuser = 'root'; 
            $dbpass = '';

            $pdo = new PDO('mysql:host=localhost;dbname=sidcambi', $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->exec("SET NAMES 'utf8'");
            
            return $pdo;
        } catch (PDOException $e) {
            print "ERROR!: ". $e->getmessage() . "<br/>";
            die();
        }
    
    }
    
}   
