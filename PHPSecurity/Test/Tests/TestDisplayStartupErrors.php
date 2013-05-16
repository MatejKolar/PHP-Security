<?php
include_once 'Test\Test.php';

class TestDisplayStartupErrors extends Test {
    
    protected $tag = "TestDisplayStartupErrors";
    const MY_ERROR = 'Vlastnost "diplay_startup_errors" je povolena. 
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
