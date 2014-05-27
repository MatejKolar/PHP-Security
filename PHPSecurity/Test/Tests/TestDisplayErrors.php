<?php
include_once 'Test\Test.php';

class TestDisplayErrors extends Test {
    
    protected $tag = "TestDisplayErrors";
    const MY_ERROR = 'Vlastnost "diplay_errors" je povolena. 
                      Zobrazují se všechny chyby v kódu PHP. 
                      Používejte ji pouze pro vývojářské potřeby.  
                     ';
    
    public function doTest() {
        if(ini_get('display_errors')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
