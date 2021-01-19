<?php
  class Menuitem{
    private $itemName;
    private $description;
    private $price;
    
    
    function __construct($itemName, $description, $price){
        $this->itemName = $itemName;
        $this->description = $description;
        $this->price = $price;
    }
    
    public function getItemName(){
        return $this->itemName;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
  }
  
?>