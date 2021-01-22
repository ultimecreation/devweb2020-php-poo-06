<?php 

class AuthModel extends Model{

    public function save($user)
    {
        try{
            $this->bdd->beginTransaction();

            $req = $this->bdd->prepare("
                INSERT INTO users 
                SET username=?, email=?, password=?
            ");
            $req->execute(array($user->username,$user->email,$user->password));

            $user_id = $this->bdd->lastInsertId();
            if($user_id){
                $req = $this->bdd->prepare("
                    INSERT INTO farms 
                    SET name=?, health=100
                ");
                $req->execute(array($user->farm_name));

                $farm_id = $this->bdd->lastInsertId();

                if($farm_id){
                    $req = $this->bdd->prepare("
                        INSERT INTO farm_owners 
                        SET user_id=?, farm_id=?
                    ");
                    $req->execute(array($user_id,$farm_id));
                    $this->bdd->commit();
                    return true;
                }
            }
        }
        catch(Exception $e)
        {
            $this->bdd->rollback();
            echo $e->getMessage();
        }
    }

    public function isUsernameTaken($username){
        $req = $this->bdd->prepare("SELECT * FROM users WHERE username=?");
        $req->execute(array($username));
        $res = $req->fetch();
        if($res) return true;
        return false;
    }

    public function isEmailTaken($email){
        $req = $this->bdd->prepare("SELECT * FROM users WHERE email=?");
        $req->execute(array($email));
        $res = $req->fetch();
        if($res) return true;
        return false;
    }

    public function getUserByEmail($email){
        $req = $this->bdd->prepare("SELECT * FROM users WHERE email=?");
        $req->execute(array($email));
        return $req->fetch();
    }
}