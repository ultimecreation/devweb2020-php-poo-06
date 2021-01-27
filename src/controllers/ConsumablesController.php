<?php

class ConsumablesController extends Controller{
    public function list(){
        return $this->renderView("consumables/list");
    }
}