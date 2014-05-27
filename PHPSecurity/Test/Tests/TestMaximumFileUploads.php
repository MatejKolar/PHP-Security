<?php
include_once 'Test\Test.php';

class TestMaximumFileUploads extends Test {
    
    protected $tag = "TestMaximumFileUploads";
    const MY_ERROR = '';
    
    public function doTest() {
        $this->report = 'Maximální počet současně nahrávaných souborů je: ' . ini_get('max_file_uploads')
                        . "<br>Tato velikost by měla odpovídat požadavkům vaší aplikace.";
    }    
}

?>
