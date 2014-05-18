<?php
require_once 'Test/Test.php';

class TestDisplayStartupErrors extends Test {
    
    protected $tag = "TestDisplayStartupErrors";
    protected $recommendedValue = "off";
    protected $iniTag = "display_startup_errors";
    const MY_ERROR = 
'
Vlastnost "display_startup_errors" je povolena. 
Zobrazují se chyby při spuštění PHP. 
Používejte ji pouze pro vývojářské potřeby.
';
    
    public function doTest() {
        if(ini_get('display_startup_errors')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
