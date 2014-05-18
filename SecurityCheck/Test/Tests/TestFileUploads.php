<?php
require_once 'Test/Test.php';

class TestFileUploads extends Test {
    
    protected $tag = "TestFileUploads";
    protected $recommendedValue = "off";
    protected $iniTag = "file_uploads";
    const MY_ERROR = 
'
Vlastnost PHP "file_uploads" je povolena. 
Tato vlastnost umožňuje nahrávání souborů na server pomocí PHP. 
Pokud ji nevyužíváte, zvažte její vypnutí.
';
    
    public function doTest() {
        if(ini_get('file_uploads')) {
            $this->rank = 2;
            $this->report = $this::MY_ERROR;
        } else {
            $this->rank = 10;
            $this->report = "";
        }
    }    
}

?>
