<?php

class UserModel extends Model{

    public function getUserById($id){
        $req = $this->bdd->prepare("SELECT * FROM users WHERE id=?");
        $req->execute(array($id));
        return $req->fetch();
    }

    public function update($user){
        $req = $this->bdd->prepare("
            UPDATE users
            SET email=?, password=?
        ");
        $req->execute(array($user->email,$user->password));
        
    }
   
}