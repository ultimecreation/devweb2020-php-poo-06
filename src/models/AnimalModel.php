<?php

class AnimalModel extends Model{
    public function getAll(){
        $req = $this->bdd->query("
            SELECT
                animals.name,animals.img,animals.hunger_level,
                animals.thirst_level,animals.global_health,
                animal_types.name AS type
            FROM animals 
            JOIN animal_types ON animal_types.id=animals.type_id
            WHERE animal_status_id=1
        ");
        return $req->fetchAll();

    }
}