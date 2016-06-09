<?php
namespace Model;

class User extends Model
{
    protected $table = 'users';
    
    protected $cn = null;

    /**
     * Model constructor.
     * Creates the PDO connection
     */
    public function check($credentials)
    {
        
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([
            ':email' => $credentials['email'],
            ':password' => $credentials['password']   
        ]);

        return $pdoSt->fetch();
    }

    
}