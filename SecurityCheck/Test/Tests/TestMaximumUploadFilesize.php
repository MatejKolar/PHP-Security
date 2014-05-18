<?php
require_once 'Test/Test.php';

class TestMaximumUploadFilesize extends Test {
    
    protected $tag = "TestMaximumUploadFilesize";
    const MY_ERROR = '';
    protected $recommendedValue = "20";
    protected $iniTag = "max_file_uploads";
    protected $rank = 10;
    
    public function doTest() {
        $this->report = 
'
Maximální velikost nahrávaného souboru je: ' . ini_get('upload_max_filesize') .
'<br>Tato velikost by měla odpovídat požadavkům vaší aplikace.
';
    }    
}

?>
