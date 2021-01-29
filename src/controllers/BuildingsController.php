<?php

class BuildingsController extends Controller{
    public function list(){
        $data['buildings'] = $this->getModel('BuildingModel')->getAll();
        return $this->renderView("buildings/list",$data);
    }
}