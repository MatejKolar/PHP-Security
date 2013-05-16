<?php
include_once 'Test\Test.php';

class TestExposePHP extends Test {
    
    protected $tag = "TestExposePHP";
    const MY_ERROR = '
            Vlastnost PHP "expose_php" je povolena,
            umožňuje potenciálním útočníkům dozvědět se, jakou verzi PHP používáte.';
    
    public function doTest() {
        if(ini_get('expose_php')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
