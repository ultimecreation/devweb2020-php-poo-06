<?php

class FoodsController extends Controller{
    public function list(){
        return $this->renderView("foods/list");
    }
}