<?php 

class FoodModel extends Model{
    public function getAll(){
        $req = $this->bdd->query("
            SELECT * FROM foods
        ");
        return $req->fetchAll();
    }
}