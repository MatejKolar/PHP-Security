<?php
require_once 'Test/Test.php';

class TestDisplayErrors extends Test {
    
    protected $tag = "TestDisplayErrors";
    protected $recommendedValue = "off";
    protected $iniTag = "display_errors";
    const MY_ERROR = 
'
Vlastnost "display_errors" je povolena. 
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
