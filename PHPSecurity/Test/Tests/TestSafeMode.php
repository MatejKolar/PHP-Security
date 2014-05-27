<?php
include_once 'Test\Test.php';

class TestSafeMode extends Test {
    
    protected $tag = "TestSafeMode";
    const MY_ERROR = '
            Vlastnost PHP "safe_mode" je zapnuta,
            věnujte pozornost nastavení. 
            Tato vlastnost je zastaralá a v PHP 5.4 odstraněna.
            <a href="http://php.net/manual/en/features.safe-mode.php">Více o problému</a>
            ';
    
    public function doTest() {
        if(ini_get('safe_mode')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
