<?php

class TechnicsController extends Controller{
    public function list(){
        $data['technics'] = $this->getModel("TechnicModel")->getAll();
        return $this->renderView("technics/list",$data);
    }
}