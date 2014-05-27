<?php
include_once 'Test\Test.php';

class TestDisableFunctions extends Test {
    
    protected $tag = "TestDisableFunctions";
    const MY_ERROR = '
            Vlastnost "disable_functions" je vypnuta.
            Tato vlastnost umožňuje vypnutí některých funkcí systému pro zvýšení bezpečnosti.
            <a href="http://www.php.net/manual/en/ini.core.php#ini.disable-functions">
            Více informací</a>';
    
    public function doTest() {
        if(ini_get('disable_functions')) {
            $this->rank = 10;
            $this->report = "";
        } else {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        }
    }    
}

?>
