<?php
//  <html />, <header /> e <body />
class Body{

    private $sClass;
    private $aListElement = array();
    
    public function __construct($sClass) {
        $this->setBody($sClass);
    }

    public function setBody($sClass){
        $this->sClass = $sClass;
    }

    public function addElementBody($sElement) {
        $this->aListElement[] = $sElement;
    }

    
    public function getBody(){
        $sBody = '<body class="'.$this->sClass.'">';
        foreach ($this->aListElement as $sItemListElement) {
            $sBody .= $sItemListElement;
        }
        $sBody .= "</body>";
        return $sBody;
    }
}