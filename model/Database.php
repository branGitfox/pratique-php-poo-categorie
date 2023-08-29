<?php  
 class Database {
    public static $dbname = 'rel';
    public static $user = 'root';

    public static $host = '127.0.0.1';
    public static $con;

    public static function connect(): PDO {
        try{
            if(self::$con == null){
                self::$con = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname.";", self::$user, '');
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
       

        return self::$con;
    }

    public static function category (): array {
        $db = self::connect()->query('SELECT name,id FROM category');
        $db->execute();
        $data = $db->fetchAll();
        return $data;
    }

    private static function getName(){
        if(isset($_POST['nom']) && !empty($_POST['nom'])){
          return $_POST['nom'];
        }
      
    }

    private static function getOpt(){
        if(isset($_POST['opt']) && !empty($_POST['opt'])){
          return (int)$_POST['opt'];
        }
      
    }

    public static function insertInto() {
        $bd = self::connect()->prepare('INSERT INTO product (`name`, `category`) VALUES (?,?)');
        $bd->execute([self::getName(), self::getOpt()]);
        return $bd;
    }

    public static function selectAllWithCategory(): array {
        $req = self::connect()->prepare('SELECT product.name AS produit, category.name As categorie FROM product LEFT JOIN category ON product.category = category.id');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }
 }