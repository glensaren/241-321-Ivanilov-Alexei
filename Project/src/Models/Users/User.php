<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $username;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    
    protected static function getTableName(){
        return 'users';
    }

    public function setUsername(string $username){
        $this->username = $username;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }
}