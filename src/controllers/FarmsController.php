<?php

class FarmsController extends Controller{
    public function list(){

    }

    public function getMyFarms(){
        $data['farms'] = $this->getModel("FarmModel")->getFarmsByOwnerId(getUserData('id'));

        return $this->renderView("farms/list",$data);
    }
}