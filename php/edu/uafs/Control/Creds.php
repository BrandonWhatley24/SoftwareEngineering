   <?php 
    class Creds{
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "Garmon22";
    
    private static $dbname = "test";
     
    
    public static function getHost() {
        return self::$host;
    }

    public static function getUsername() {
        return self::$username;
    }

    public static function getPassword() {
        return self::$password;
    }

    public static function getDbname() {
        return self::$dbname;
    }
}
    ?>