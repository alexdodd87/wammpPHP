<?php

class db
{
    protected $con;

    public function __construct()
    {
        try {
            $db_host = 'localhost';  //  hostname
            $db_name = 'my_new_db';  //  databasename
            $db_user = 'root';  //  username
            $user_pw = '';  //  password

            $this->con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $user_pw);
            $this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8
        }
        catch (PDOException $err) {
            echo "harmless error message if the connection fails";
            $err->getMessage() . "<br/>";
            file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html
            die();  //  terminate connection
        }
    }

    public function dbh()
    {
        return $this->con;
    }
}


?>