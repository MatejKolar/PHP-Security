<?php
require_once 'Test/Test.php';

class TestUploadDir extends Test {
    
    protected $tag = "TestUploadDir";
    protected $iniTag = "";
    const MY_ERROR = '';
    
    public function doTest() {
        $this->report = 
'
Adresář dočasných souborů je: ' . ini_get('upload_tmp_dir') . '
';
    }    
}

?>
