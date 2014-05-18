<?php
require_once 'Test/Test.php';

class TestMemoryLimit extends Test {
    
    protected $tag = "TestMemoryLimit";
    const MY_ERROR = '';
    protected $rank = 10;
    
    public function doTest() {
        $this->report = 
'
Limit omezení paměti je: ' . ini_get('memory_limit') .
'<br>Tato velikost by měla odpovídat požadavkům vaší aplikace.
';
    }    
}

?>
