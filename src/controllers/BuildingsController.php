<?php

class BuildingsController extends Controller{
    public function list(){
        return $this->renderView("buildings/list");
    }
}