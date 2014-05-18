<?php
require_once 'Test/Test.php';

class TestMaximumFileUploads extends Test {
    
    protected $tag = "TestMaximumFileUploads";
    protected $recommendedValue = "20";
    protected $iniTag = "max_file_uploads";
    const MY_ERROR = '';
    protected $rank = 10;
    
    public function doTest() {
        $this->report = 
'
Maximální počet současně nahrávaných souborů je: ' . ini_get('max_file_uploads') .
'<br>Tato velikost by měla odpovídat požadavkům vaší aplikace
';
    }    
}

?>
