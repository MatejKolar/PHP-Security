<?php
include_once 'Test\Test.php';

class TestLogErrors extends Test {
    
    protected $tag = "TestLogErrors";
    const MY_ERROR = 'Vlastnost "log_errors" není povolena.
                      Tato vlastnost povoluje zaznamenávání chyb při běhu kódu PHP. 
                      Případné chyby nebudou zaznamenávány.
                     ';
    
    public function doTest() {
        if(!ini_get('log_errors')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
