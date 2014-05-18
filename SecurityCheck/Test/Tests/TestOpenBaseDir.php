<?php
require_once 'Test/Test.php';

class TestOpenBaseDir extends Test {
    
    protected $tag = "TestOpenBaseDir";
    protected $iniTag = "";
    const MY_ERROR = 
'
Vlastnost "open_base_dir" není nastavena. 
Zvažte její nastavení, zvýšíte tím bezpečnost před souborovými útoky. 
<a href="https://www.owasp.org/index.php/PHP_Top_5#P5:_File_system_attacks">Více informací</a>
';
    
    public function doTest() {
        if(!ini_get('open_base_dir')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
