<?php
include_once 'Test\Test.php';
include 'Test\Tests\TestAllowUrlFopen.php';
include 'Test\Tests\TestAllowUrlInclude.php';
include 'Test\Tests\TestSafeMode.php';
include 'Test\Tests\TestOpenBaseDir.php';
include 'Test\Tests\TestDisableFunctions.php';
include 'Test\Tests\TestMemoryLimit.php';
include 'Test\Tests\TestMaximumUploadFilesize.php';
include 'Test\Tests\TestFileUploads.php';
include 'Test\Tests\TestMaximumFileUploads.php';
include 'Test\Tests\TestUploadDir.php';
include 'Test\Tests\TestDisplayErrors.php';
include 'Test\Tests\TestDisplayStartupErrors.php';
include 'Test\Tests\TestExposePHP.php';
include 'Test\Tests\TestMagicQuotesGPC.php';
include 'Test\Tests\TestMagicQuotesRuntime.php';
include 'Test\Tests\TestRegisterGlobals.php';
include 'Test\Tests\TestUseTransSid.php';
include 'Test\Tests\TestLogErrors.php';

use Nette\Forms\Form;
require 'Nette/loader.php';

class Application {
    private $tests = array();
    private $form;
    
    function __construct() {
        $this->form = new Form();
        $this->addTests();
        $this->formInit();
        $this->buildForm();
        $this->formFinish();
    }
    
    private function addTests() {
        $this->tests['AllowUrlFopen'] = new TestAllowUrlFopen();
        $this->tests['AllowUrlInclude'] = new TestAllowUrlInclude();
        $this->tests['SafeMode'] = new TestSafeMode();
        $this->tests['OpenBaseDir'] = new TestOpenBaseDir();
        $this->tests['DisableFunctions'] = new TestDisableFunctions();
        $this->tests['MemoryLimit'] = new TestMemoryLimit();
        $this->tests['MaximumUploadFilesize'] = new TestMaximumUploadFilesize();
        $this->tests['FileUploads'] = new TestFileUploads();
        $this->tests['MaximumFileUploads'] = new TestMaximumFileUploads();
        $this->tests['UploadDir'] = new TestUploadDir();
        $this->tests['DisplayErrors'] = new TestDisplayErrors();
        $this->tests['DisplayStartupErrors'] = new TestDisplayStartupErrors();
        $this->tests['ExposePHP'] = new TestExposePHP();
        $this->tests['MagicQuotesGPC'] = new TestMagicQuotesGPC();
        $this->tests['MagicQuotesRuntime'] = new TestMagicQuotesRuntime();
        $this->tests['RegisterGlobals'] = new TestRegisterGlobals();
        $this->tests['UseTransSid'] = new TestUseTransSid();
        $this->tests['LogErrors'] = new TestLogErrors();
    }
    
    private function buildForm() {
        // Loops over all tests in array $tests
        
        foreach ($this->tests as $test) {
            $test->formPrint($this->form);
        }
    }
    
    private function formInit() {

        $variants = array(
            "setVariant0" => "None",
            "setVariant1" => "Files&Memory",
            "setVariant2" => "Cross-Site",
            "setVariant3" => "Errors",
            "setVariant4" => "All"
        );
        
        $this->form->addSelect("formSelect", "Vyberte úroveň testování: ", $variants)
            ->setPrompt("Vyberte variantu")
            ->setAttribute("onclick", "window[this.value]();")
            ->setAttribute("class", "control-label");
        
    }
    
    private function formFinish() {
        $this->form->addSubmit("process", "Process")
            ->setAttribute("class", "btn");
        
    }
    
    public function getForm() {
        return $this->form;
    }
    
    public function getReport() {
        $index = 0;
        $report = "";
        $rank = 0;
        $retArray = array();
        $valArray = $this->form->getValues(TRUE);
        
        foreach ($this->tests as $test) {
            if ($valArray[$test->getTag()] == TRUE) {
                $test->doTest();
                $report .= "<p>" . $test->getReport() . "</p>";
                $rank += $test->getRank();
                $index++;
            }
        }
        if ($index != 0) {
            $rank /= $index;
        } 
        
        $retArray["rank"] = $rank;
        $retArray["report"] = "<p>" . $report . "</p>";
        
        return $retArray;
    }
    
}

?>
