<?php

class AnimalsController extends Controller{
    public function list(){
        $data['animals'] = $this->getModel('AnimalModel')->getAll();
        return $this->renderView("animals/list",$data);
    }
}