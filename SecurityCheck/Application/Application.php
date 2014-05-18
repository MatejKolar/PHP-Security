<?php
require 'Test/Test.php';
require 'Test/Tests/TestAllowUrlFopen.php';
require 'Test/Tests/TestAllowUrlInclude.php';
require 'Test/Tests/TestSafeMode.php';
require 'Test/Tests/TestOpenBaseDir.php';
require 'Test/Tests/TestDisableFunctions.php';
require 'Test/Tests/TestMemoryLimit.php';
require 'Test/Tests/TestMaximumUploadFilesize.php';
require 'Test/Tests/TestFileUploads.php';
require 'Test/Tests/TestMaximumFileUploads.php';
require 'Test/Tests/TestUploadDir.php';
require 'Test/Tests/TestDisplayErrors.php';
require 'Test/Tests/TestDisplayStartupErrors.php';
require 'Test/Tests/TestExposePHP.php';
require 'Test/Tests/TestMagicQuotesGPC.php';
require 'Test/Tests/TestMagicQuotesRuntime.php';
require 'Test/Tests/TestRegisterGlobals.php';
require 'Test/Tests/TestUseTransSid.php';
require 'Test/Tests/TestLogErrors.php';


class Application {
    private $tests = array();
    private $form;
    
    function __construct() {
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
            $tag = $test->getTag();
            $this->form .= 
                    '
                    <tr>
                        <th></th>
                        <td>
                            <label for="frm-' . $tag . '">
                                <input id="frm-' . $tag . '" type="checkbox" name="' . $tag . '"></input>
                                ' . $tag . '
                            </label>
                        </td>
                    </tr>
                        ';
        }
    }
    
    private function formInit() {
        $this->form = '
        <form method="post" action="">
            <table>
                <tbody>
                    <tr>
                        <th>
                            <label for="frm-formSelect">
                                Vyberte úroveň testování: 
                            </label>
                        </th>
                        <td>
                            <select id="frm-formSelect" class="control-label" onclick="window[this.value]();" name="formSelect">
                                <option value="">
                                    Vyberte variantu
                                </option>
                                <option value="setVariant0">
                                    None
                                </option>
                                <option value="setVariant1">
                                    Files&Memory
                                </option>
                                <option value="setVariant2">
                                    Cross-Site
                                </option>
                                <option value="setVariant3">
                                    Errors
                                </option>
                                <option value="setVariant4">
                                    All
                                </option>
                            </select>
                        </td>
                    </tr>
        ';
    }
    
    private function formFinish() {
        $this->form .= 
            '
                <tr>
                    <th></th>
                    <td>
                        <input id="frm-process" class="btn button" type="submit" value="Process" name="process"></input>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <!--
            [if IE]><input type=IEbug disabled style="display:…
            -->
        </div>

    </form>
            ';
    }
    
    public function getForm() {
        return $this->form;
    }
    
    public function getReport($postArray) {
        $index = 0;
        $report = "";
        $rank = 0;
        $retArray = array();
        $class = "";
        $pdfReport = "";
        
        foreach ($this->tests as $test) {
            if (!empty($postArray[$test->getTag()]) && $postArray[$test->getTag()] === "on") {
                $test->doTest();
                if ($test->getReport() !== "")
                {
                    if ($test->getRank() < 5) {
                        $class = 'class="alert alert-error"';
                    } else if ($test->getRank() < 8) {
                        $class = 'class="alert"';
                    } else {
                        $class = 'class="alert alert-success"';
                    }
                    $report .= "<p " . $class .  ">" . $test->getReport() . "</p>";
                    $pdfReport .= $test->getReport();
                    $this->saveReport($pdfReport);
                }
                if ($test->getRank() !== 0)
                    $rank += $test->getRank();
                $index++;
            }
        }
        if ($index != 0) {
            $rank /= $index;
        }
        $retArray["rank"] = $rank;
        $retArray["report"] = "<p>" . $report . "</p>";
        $retArray["pdfReport"] = $pdfReport;
        return $retArray;
    }
    
    public function getGenerateForm($postArray)
    {
        $checkboxes = "";
        foreach ($this->tests as $test) {
            $tag = $test->getTag();
            if (!empty($postArray[$tag]) && $postArray[$tag] === "on") {
                $checked = "";
                if ($test->getReport() !== "")
                {
                    $checked = "checked";
                }
                $checkboxes .= 
                        '
                    <tr>
                        <th></th>
                        <td>
                            <label for="frm-' . $tag . '">
                                <input id="frm-' . $tag . '" type="checkbox" name="' . $tag . '" ' . $checked . '></input>
                                ' . "Změnit <b>" . $tag . "</b> na doporučenou hodnotu: <b>" . $test->getRecommendedValue() . '</b>
                            </label>
                        </td>
                    </tr>
                        ';
            }
        }
        return 
        '
        <form method="post" action="">
            <table>
                <tbody>
                    <tr>
                        <th>
                            <label for="frm-generateReport">
                                Generování reportu:  
                            </label>
                        </th>
                        <td>
                            <input id="frm-generateReport" class="btn button" type="submit" value="Generate" name="generateReport"></input>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="frm-generateIni">
                                Generování skriptu php.ini:  
                            </label>
                        </th>
                        <td>
                            <input id="frm-generateIni" class="btn button" type="submit" value="Generate" name="generateIni"></input>
                        </td>
                    </tr>
' . $checkboxes . 
'                </tbody>
            </table>
        </form>            
        ';
    }
    
    public function saveReport($report)
    {
        
        $report = str_replace("<br>", "\n", $report);
        $arrayOutput = explode("\n", $report);
        $report = "";
        foreach ($arrayOutput as $line)
        {
            if (strpos($line, "<a") === FALSE)
                $report .= $line . "\n";
        }
        
        $report = "Kontrola bezpečnosti PHP serveru: \n#################################\n" . $report;
        @file_put_contents("report.txt", "\xEF\xBB\xBF". $report);
    }
    
    public function getPhpIni($postArray)
    {
        $inipath = php_ini_loaded_file();

        $stringini = @file_get_contents($inipath);
        $generatedIni = "";
        if ($stringini === FALSE) {
            $generatedIni = "Nepodařilo se otevřít soubor php.ini";
        } else {
            $arrayOutput = explode("\n", $stringini);
            foreach ($arrayOutput as $line) {
                $pom = NULL;
                foreach ($this->tests as $test) {
                    if (!empty($postArray[$test->getTag()]) && $postArray[$test->getTag()] === "on") {
                        if (strpos($line, $test->getIniTag()) !== FALSE) {
                            $pom = $test;
                        } 
                    }
                }
                if ($pom === NULL) {
                    $generatedIni .= $line . "\n";
                } else {
                    $generatedIni .= $pom->getIniTag() . " = " . $pom->getRecommendedValue() . "\n";
                }
            }
        }
        return $generatedIni;
    }
}
?>