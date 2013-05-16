<?php

use Nette\Forms\Form;

abstract class Test {
    
    protected $rank;
    protected $report;
    protected $tag;


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
}

?>
