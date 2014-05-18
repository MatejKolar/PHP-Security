<?php
require_once 'Test/Test.php';

class TestMagicQuotesGPC extends Test {
    
    protected $tag = "TestMagicQuotesGPC";
    protected $recommendedValue = "off";
    protected $iniTag = "magic_quotes_gpc";
    const MY_ERROR = 
'
Vlastnost PHP "magic_quotes_gpc" je povolena,
tato vlastnost je zastaralá a nedoporučuje se její použití.
<a href="https://www.owasp.org/index.php/PHP_Top_5#addslashes.28.29_.2F_magic_quotes">Více informací</a>
';
    
    public function doTest() {
        if(ini_get('magic_quotes_gpc')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
