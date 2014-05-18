<?php
require_once 'Test/Test.php';

class TestAllowUrlInclude extends Test {
    
    protected $tag = "TestAllowUrlInclude";
    protected $recommendedValue = "off";
    protected $iniTag = "allow_url_include";
    const MY_ERROR = 
'
Vlastnost "allow_url_include" je povolena. 
Umožňuje potenciální zneužití pro provedení škodlivého kódu.
Pokud ji nepoužíváte, vypněte ji.
<a href="http://cz2.php.net/features.remote-files.php">Více informací</a>
';
    
    public function doTest() {
        if(ini_get('allow_url_include')) {
            $this->rank = 6;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }  
}

?>
