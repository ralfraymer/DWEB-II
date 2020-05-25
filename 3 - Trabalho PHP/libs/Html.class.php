<?php
class Html{
   
    private $lang;
    private $aListElement = array();
    
    public function __construct($lang) {
        $this->setHtml($lang);
    }
    
    public function setHtml($lang){
        $this->lang = $lang;
    }

    public function addElementHtml($sElement) {
        $this->aListElement[] = $sElement;
    }
    public function getHtml(){
        $sHtml = '<!DOCTYPE html>
                  <html lang='.$this->lang.'>';
        foreach ($this->aListElement as $sItemListElement) {
            $sHtml .= $sItemListElement;
        }
        $sHtml .= '</html>';
        return $sHtml;
    }


    
}
