<?php

abstract class Test {
    
    protected $rank;
    protected $report;
    protected $tag;
    protected $recommendedValue;
    protected $iniTag;
            

    function formPrint(Form $form) {
        $form->addCheckbox($this->tag, $this->tag);            
    }
    
    abstract protected function doTest();
    
    public function getReport() {
        return $this->report;
    }
    public function getRank() {
        return $this->rank;
    }
    public function getTag() {
        return $this->tag;
    }
    public function getRecommendedValue() {
        return $this->recommendedValue;
    }
    public function getIniTag() {
        return $this->iniTag;
    }
}

?>
