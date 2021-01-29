<?php

class FoodsController extends Controller{
    public function list(){
        $data['foods'] = $this->getModel('FoodModel')->getAll();
        return $this->renderView("foods/list",$data);
    }
}