<?php
include_once 'Test\Test.php';

class TestUseTransSid extends Test {
    
    protected $tag = "TestUseTransSid";
    const MY_ERROR = '
            Vlastnost PHP "use_trans_sid" je povolena.
            Je možné používat cizí SID obsažené v URL.
            <a href="http://www.php.net/manual/en/session.configuration.php#ini.session.use-trans-sid">
            Více informací</a>';
    
    public function doTest() {
        if(ini_get('use_trans_sid')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
