<?php

class BuildingsController extends Controller{
    public function list(){
        $current_farm_id = isset($_GET['ferme']) ? intval($_GET['ferme']) :null ;
        $data['current_farm'] = $this->getModel('FarmModel')->getFarmById($current_farm_id);
        $data['buildings'] = $this->getModel('BuildingModel')->getAll();

        return $this->renderView("buildings/list",$data);
    }
}