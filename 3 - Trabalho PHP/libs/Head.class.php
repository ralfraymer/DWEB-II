<?php

class Head{
    private $aListElement = array();
    
    public function addElementHead($sElement) {
        $this->aListElement[] = $sElement;
    }

    public function getHead(){
        $sHead = "<head>";
        foreach ($this->aListElement as $sItemListElement) {
            $sHead .= $sItemListElement;
        }
        $sHead .= "</head>";
        return $sHead;
    }
}