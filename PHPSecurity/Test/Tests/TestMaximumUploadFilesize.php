<?php
include_once 'Test\Test.php';

class TestMaximumUploadFilesize extends Test {
    
    protected $tag = "TestMaximumUploadFilesize";
    const MY_ERROR = '';
    
    public function doTest() {
        $this->report = 'Maximální velikost nahrávaného souboru je: ' . ini_get('upload_max_filesize')
                        . "<br>Tato velikost by měla odpovídat požadavkům vaší aplikace.";
    }    
}

?>
