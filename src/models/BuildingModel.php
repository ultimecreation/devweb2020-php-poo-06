<?php 

class BuildingModel extends Model{
    public function getAll(){
        $req = $this->bdd->query("
            SELECT 
                buildings.name,buildings.description,buildings.img,
                levels.name AS level,levels.id as level_id,levels.timespan,levels.rate,levels.cost
            FROM buildings
            JOIN levels ON buildings.level_id=levels.id
        ");
        return $req->fetchAll();
    }
}