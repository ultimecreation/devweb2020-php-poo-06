<?php

class FarmModel extends Model{
    public function getAll(){
        $req = $this->bdd->query("
            SELECT * FROM farms
        ");
        return $req->fetchAll();
    }

    public function getFarmById($id){
        $req = $this->bdd->prepare("
            SELECT * FROM farms
            JOIN levels ON farms.level_id=levels.id
            WHERE farms.id=?
        ");
        $req->execute(array($id));
        return $req->fetch();
    }
    public function getFarmsByOwnerId($id){
        $req = $this->bdd->prepare("
            SELECT * FROM farm_owners
            JOIN farms ON farm_owners.farm_id=farms.id
            WHERE user_id=?
        ");
        $req->execute(array($id));
        return $req->fetchAll();
    }
}