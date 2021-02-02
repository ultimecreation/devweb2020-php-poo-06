<?php
class TechnicModel extends Model{
    public function getAll(){
        $req = $this->bdd->query("
            SELECT * FROM technics
        ");
        return $req->fetchAll();
    }
}