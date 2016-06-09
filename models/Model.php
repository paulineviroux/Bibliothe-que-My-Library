<?php
namespace Model;



// Model\Model

class Model
{
    protected $table = '';
    protected $cn = null;

    public function __construct() {
        $dbConfig = parse_ini_file( 'db.ini' ); 
        $pdoOptions = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]; 

        try{ 
            $dsn = sprintf( '%s:host=%s;dbname=%s',$dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] ); 
            $this->cn = new \PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ], $pdoOptions ); 
            $this->cn -> exec( 'SET CHARACTER SET UTF8' ); 
            $this->cn -> exec( 'SET NAMES UTF8' ); 
        } catch( \PDOException $e ) { 
            die( $e->getMessage() ); 
        }
    }

    public function all() {
        $sql = 'SELECT * FROM ' . $this -> table; 
        $stmnt = $this -> cn -> query( $sql ); 

        return $stmnt -> fetchAll(); 
    }

    public function find( $id ) {
        $sql = 'SELECT * FROM ' . $this -> table . ' WHERE id = :id';
        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ 'id' => $id ] );

        return $stmnt -> fetch();
    }

    public function save($fields)
    {
        $sFieldsNames = implode('`, `', array_keys($fields));
        $sFieldsJokers = implode(', :', array_keys($fields));
        $sql = sprintf('INSERT INTO %s(`%s`) VALUES(:%s)',
            $this->table,
            $sFieldsNames,
            $sFieldsJokers);
        $pdoSt = $this->cn->prepare($sql);
        foreach (array_keys($fields) as $field) {
            $pdoSt->bindValue(':' . $field, $fields[$field]);
        }
        return $pdoSt->execute();
    }
}
