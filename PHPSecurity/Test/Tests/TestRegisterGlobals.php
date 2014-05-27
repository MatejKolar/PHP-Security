<?php
include_once 'Test\Test.php';

class TestRegisterGlobals extends Test {
    
    protected $tag = "TestRegisterGlobals";
    const MY_ERROR = '
                      Vlastnost PHP "register_globals" je povolena,
                      tato vlastnost je zastaralá a představuje velké bezpečnostní riziko.
                      <a href="http://php.net/manual/en/security.globals.php">
                      Více informací</a>';
    
    public function doTest() {
        if(ini_get('register_globals')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
