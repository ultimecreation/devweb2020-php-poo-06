<?php 

class BuildingModel extends Model{
    public function getAll(){
        $req = $this->bdd->query("
            SELECT * FROM buildings
        ");
        return $req->fetchAll();
    }
}