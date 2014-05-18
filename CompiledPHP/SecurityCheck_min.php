<?phpabstract class Test {        protected $rank;    protected $report;    //protected $reportTXT;    protected $tag;    protected $recommendedValue = "null";    protected $iniTag = "";                function formPrint(Form $form) {        $form->addCheckbox($this->tag, $this->tag);                }        abstract protected function doTest();        public function getReport() {        return $this->report;    }    /*    public function getReportTXT() {        return $this->reportTXT;    }    */    public function getRank() {        return $this->rank;    }    public function getTag() {        return $this->tag;    }    public function getRecommendedValue() {        return $this->recommendedValue;    }}?><?phpclass TestAllowUrlFopen extends Test {        protected $tag = "TestAllowUrlFopen";    const MY_ERROR = 'Vlastnost "allow_url_fopen" je povolena.Umožňuje potenciální zneužití pro provedení škodlivého kódu.Pokud ji nepoužíváte, vypněte ji.<a href="http://cz2.php.net/features.remote-files.php">Více informací</a> ';                             public function doTest() {        if(ini_get('allow_url_fopen')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestAllowUrlInclude extends Test {        protected $tag = "TestAllowUrlInclude";    const MY_ERROR = 'Vlastnost "allow_url_include" je povolena. Umožňuje potenciální zneužití pro provedení škodlivého kódu.Pokud ji nepoužíváte, vypněte ji.<a href="http://cz2.php.net/features.remote-files.php">Více informací</a>';        public function doTest() {        if(ini_get('allow_url_include')) {            $this->rank = 6;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }  }?><?phpclass TestDisableFunctions extends Test {        protected $tag = "TestDisableFunctions";    const MY_ERROR = 'Vlastnost "disable_functions" je vypnuta.Tato vlastnost umožňuje vypnutí některých funkcí systému pro zvýšení bezpečnosti.<a href="http://www.php.net/manual/en/ini.core.php#ini.disable-functions">Více informací</a>';        public function doTest() {        if(ini_get('disable_functions')) {            $this->rank = 10;            $this->report = "";        } else {            $this->rank = 2;            $this->report = $this::MY_ERROR;        }    }    }?><?phpclass TestDisplayErrors extends Test {        protected $tag = "TestDisplayErrors";    const MY_ERROR = 'Vlastnost "diplay_errors" je povolena. Zobrazují se všechny chyby v kódu PHP. Používejte ji pouze pro vývojářské potřeby.  ';        public function doTest() {        if(ini_get('display_errors')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestDisplayStartupErrors extends Test {        protected $tag = "TestDisplayStartupErrors";    const MY_ERROR = 'Vlastnost "diplay_startup_errors" je povolena. Zobrazují se chyby při spuštění PHP. Používejte ji pouze pro vývojářské potřeby.';        public function doTest() {        if(ini_get('display_startup_errors')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestExposePHP extends Test {        protected $tag = "TestExposePHP";    const MY_ERROR = 'Vlastnost PHP "expose_php" je povolena,umožňuje potenciálním útočníkům dozvědět se, jakou verzi PHP používáte.';        public function doTest() {        if(ini_get('expose_php')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestFileUploads extends Test {        protected $tag = "TestFileUploads";    const MY_ERROR = 'Vlastnost PHP "file_uploads" je povolena. Tato vlastnost umožňuje nahrávání souborů na server pomocí PHP. Pokud ji nevyužíváte, zvažte její vypnutí.';        public function doTest() {        if(ini_get('file_uploads')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestLogErrors extends Test {        protected $tag = "TestLogErrors";    const MY_ERROR = 'Vlastnost "log_errors" není povolena.Tato vlastnost povoluje zaznamenávání chyb při běhu kódu PHP. Případné chyby nebudou zaznamenávány.';        public function doTest() {        if(!ini_get('log_errors')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestMagicQuotesGPC extends Test {        protected $tag = "TestMagicQuotesGPC";    const MY_ERROR = 'Vlastnost PHP "magic_quotes_gpc" je povolena,tato vlastnost je zastaralá a nedoporučuje se její použití.<a href="https://www.owasp.org/index.php/PHP_Top_5#addslashes.28.29_.2F_magic_quotes">Více informací</a>';        public function doTest() {        if(ini_get('magic_quotes_gpc')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestMagicQuotesRuntime extends Test {        protected $tag = "TestMagicQuotesRuntime";    const MY_ERROR = 'Vlastnost PHP "magic_quotes_runtime" je povolena,tato vlastnost je zastaralá a nedoporučuje se její použití.<a href="https://www.owasp.org/index.php/PHP_Top_5#addslashes.28.29_.2F_magic_quotes">Více informací</a>';        public function doTest() {        if(ini_get('magic_quotes_runtime')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestMaximumFileUploads extends Test {        protected $tag = "TestMaximumFileUploads";    const MY_ERROR = '';    protected $rank = 10;        public function doTest() {        $this->report = 'Maximální počet současně nahrávaných souborů je: ' . ini_get('max_file_uploads') .'<br>Tato velikost by měla odpovídat požadavkům vaší aplikace';    }    }?><?phpclass TestMaximumUploadFilesize extends Test {        protected $tag = "TestMaximumUploadFilesize";    const MY_ERROR = '';    protected $rank = 10;        public function doTest() {        $this->report = 'Maximální velikost nahrávaného souboru je: ' . ini_get('upload_max_filesize') .'<br>Tato velikost by měla odpovídat požadavkům vaší aplikace.';    }    }?><?phpclass TestMemoryLimit extends Test {        protected $tag = "TestMemoryLimit";    const MY_ERROR = '';    protected $rank = 10;        public function doTest() {        $this->report = 'Limit omezení paměti je: ' . ini_get('memory_limit') .'<br>Tato velikost by měla odpovídat požadavkům vaší aplikace.';    }    }?><?phpclass TestOpenBaseDir extends Test {        protected $tag = "TestOpenBaseDir";    const MY_ERROR = 'Vlastnost "open_base_dir" není nastavena. Zvažte její nastavení, zvýšíte tím bezpečnost před souborovými útoky. <a href="https://www.owasp.org/index.php/PHP_Top_5#P5:_File_system_attacks">Více informací</a>';        public function doTest() {        if(!ini_get('open_base_dir')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestRegisterGlobals extends Test {        protected $tag = "TestRegisterGlobals";    const MY_ERROR = 'Vlastnost PHP "register_globals" je povolena,tato vlastnost je zastaralá a představuje velké bezpečnostní riziko.<a href="http://php.net/manual/en/security.globals.php">Více informací</a>';        public function doTest() {        if(ini_get('register_globals')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestSafeMode extends Test {        protected $tag = "TestSafeMode";    const MY_ERROR = 'Vlastnost PHP "safe_mode" je zapnuta,věnujte pozornost nastavení. Tato vlastnost je zastaralá a v PHP 5.4 odstraněna.<a href="http://php.net/manual/en/features.safe-mode.php">Více o problému</a>';        public function doTest() {        if(ini_get('safe_mode')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass TestUploadDir extends Test {        protected $tag = "TestUploadDir";    const MY_ERROR = '';        public function doTest() {        $this->report = 'Adresář dočasných souborů je: ' . ini_get('upload_tmp_dir') . '';    }    }?><?phpclass TestUseTransSid extends Test {        protected $tag = "TestUseTransSid";    const MY_ERROR = 'Vlastnost PHP "use_trans_sid" je povolena.Je možné používat cizí SID obsažené v URL.<a href="http://www.php.net/manual/en/session.configuration.php#ini.session.use-trans-sid">Více informací</a>';        public function doTest() {        if(ini_get('use_trans_sid')) {            $this->rank = 2;            $this->report = $this::MY_ERROR;        } else {            $this->rank = 10;            $this->report = "";        }    }    }?><?phpclass Application {    private $tests = array();    private $form;        function __construct() {        $this->addTests();        $this->formInit();        $this->buildForm();        $this->formFinish();    }        private function addTests() {        $this->tests['AllowUrlFopen'] = new TestAllowUrlFopen();        $this->tests['AllowUrlInclude'] = new TestAllowUrlInclude();        $this->tests['SafeMode'] = new TestSafeMode();        $this->tests['OpenBaseDir'] = new TestOpenBaseDir();        $this->tests['DisableFunctions'] = new TestDisableFunctions();        $this->tests['MemoryLimit'] = new TestMemoryLimit();        $this->tests['MaximumUploadFilesize'] = new TestMaximumUploadFilesize();        $this->tests['FileUploads'] = new TestFileUploads();        $this->tests['MaximumFileUploads'] = new TestMaximumFileUploads();        $this->tests['UploadDir'] = new TestUploadDir();        $this->tests['DisplayErrors'] = new TestDisplayErrors();        $this->tests['DisplayStartupErrors'] = new TestDisplayStartupErrors();        $this->tests['ExposePHP'] = new TestExposePHP();        $this->tests['MagicQuotesGPC'] = new TestMagicQuotesGPC();        $this->tests['MagicQuotesRuntime'] = new TestMagicQuotesRuntime();        $this->tests['RegisterGlobals'] = new TestRegisterGlobals();        $this->tests['UseTransSid'] = new TestUseTransSid();        $this->tests['LogErrors'] = new TestLogErrors();    }        private function buildForm() {        // Loops over all tests in array $tests                foreach ($this->tests as $test) {            $tag = $test->getTag();            $this->form .=                     '                    <tr>                        <th></th>                        <td>                            <label for="frm-' . $tag . '">                                <input id="frm-' . $tag . '" type="checkbox" name="' . $tag . '"></input>                                ' . $tag . '                            </label>                        </td>                    </tr>                        ';        }    }        private function formInit() {        $this->form = '        <form method="post" action="">            <table>                <tbody>                    <tr>                        <th>                            <label for="frm-formSelect">                                Vyberte úroveň testování:                             </label>                        </th>                        <td>                            <select id="frm-formSelect" class="control-label" onclick="window[this.value]();" name="formSelect">                                <option value="">                                    Vyberte variantu                                </option>                                <option value="setVariant0">                                    None                                </option>                                <option value="setVariant1">                                    Files&Memory                                </option>                                <option value="setVariant2">                                    Cross-Site                                </option>                                <option value="setVariant3">                                    Errors                                </option>                                <option value="setVariant4">                                    All                                </option>                            </select>                        </td>                    </tr>        ';    }        private function formFinish() {        $this->form .=             '                <tr>                    <th></th>                    <td>                        <input id="frm-process" class="btn button" type="submit" value="Process" name="process"></input>                    </td>                </tr>            </tbody>        </table>        <div>            <!--            [if IE]><input type=IEbug disabled style="display:…            -->        </div>    </form>            ';    }        public function getForm() {        return $this->form;    }        public function getReport($postArray) {        $index = 0;        $report = "";        $rank = 0;        $retArray = array();        $class = "";        $pdfReport = "";                foreach ($this->tests as $test) {            if (!empty($postArray[$test->getTag()]) && $postArray[$test->getTag()] === "on") {                $test->doTest();                if ($test->getReport() !== "")                {                    if ($test->getRank() < 5) {                        $class = 'class="alert alert-error"';                    } else if ($test->getRank() < 8) {                        $class = 'class="alert"';                    } else {                        $class = 'class="alert alert-success"';                    }                    $report .= "<p " . $class .  ">" . $test->getReport() . "</p>";                    $pdfReport .= $test->getReport();                    $this->saveReport($pdfReport);                }                if ($test->getRank() !== 0)                    $rank += $test->getRank();                $index++;            }        }        if ($index != 0) {            $rank /= $index;        }        $retArray["rank"] = $rank;        $retArray["report"] = "<p>" . $report . "</p>";        $retArray["pdfReport"] = $pdfReport;        return $retArray;    }        public function getGenerateForm($postArray)    {        $checkboxes = "";        foreach ($this->tests as $test) {            $tag = $test->getTag();            if (!empty($postArray[$tag]) && $postArray[$tag] === "on") {                $checked = "";                if ($test->getReport() !== "")                {                    $checked = "checked";                }                $checkboxes .=                         '                    <tr>                        <th></th>                        <td>                            <label for="frm-' . $tag . '">                                <input id="frm-' . $tag . '" type="checkbox" name="' . $tag . '" ' . $checked . '></input>                                ' . "Změnit <b>" . $tag . "</b> na doporučenou hodnotu: <b>" . $test->getRecommendedValue() . '</b>                            </label>                        </td>                    </tr>                        ';            }        }        return         '        <form method="post" action="">            <table>                <tbody>                    <tr>                        <th>                            <label for="frm-generateReport">                                Generování reportu:                              </label>                        </th>                        <td>                            <input id="frm-generateReport" class="btn button" type="submit" value="Generate" name="generateReport"></input>                        </td>                    </tr>                    <tr>                        <th>                            <label for="frm-generateIni">                                Generování skriptu php.ini:                              </label>                        </th>                        <td>                            <input id="frm-generateIni" class="btn button" type="submit" value="Generate" name="generateIni"></input>                        </td>                    </tr>' . $checkboxes . '                </tbody>            </table>        </form>                    ';    }        public function saveReport($report)    {                $report = str_replace("<br>", "\n", $report);        $arrayOutput = explode("\n", $report);        $report = "";        foreach ($arrayOutput as $line)        {            if (strpos($line, "<a") === FALSE)                $report .= $line . "\n";        }                $report = "Kontrola bezpečnosti PHP serveru: \n#################################\n" . $report;        @file_put_contents("report.txt", "\xEF\xBB\xBF". $report);    }        public function getPhpIni()    {        $inipath = php_ini_loaded_file();        $stringini = @file_get_contents($inipath);                if ($stringini === FALSE)            $stringini = "Nepodařilo se otevřít soubor php.ini";                return $stringini;    }}?><?php    $application = new Application();?><!DOCTYPE html><html>    <head>        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">          <title></title>    </head>    <body>        <style type="text/css">                        body {                margin: 0;                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;                font-size: 14px;                line-height: 20px;                color: #333333;                background-color: #ffffff;              }                            h1              {                  margin: 10px 0;                  font-family: inherit;                  font-weight: bold;                  line-height: 20px;                  color: inherit;             }                        .btn {                display: inline-block;                *display: inline;                padding: 4px 12px;                margin-bottom: 0;                *margin-left: .3em;                font-size: 14px;                line-height: 20px;                color: #333333;                text-align: center;                text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);                vertical-align: middle;                cursor: pointer;                background-color: #f5f5f5;                *background-color: #e6e6e6;                background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));                background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);                background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);                background-repeat: repeat-x;                border: 1px solid #cccccc;                *border: 0;                border-color: #e6e6e6 #e6e6e6 #bfbfbf;                border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);                border-bottom-color: #b3b3b3;                -webkit-border-radius: 4px;                   -moz-border-radius: 4px;                        border-radius: 4px;                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);                filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);                *zoom: 1;                -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);                   -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);                        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);              }              .form-horizontal .control-label {                float: left;                width: 160px;                padding-top: 5px;                text-align: right;              }                            a {                color: #0088cc;                text-decoration: none;              }              a:hover,              a:focus {                color: #005580;                text-decoration: underline;              }                              a,                a:visited {                  text-decoration: underline;                }                            .well {                min-height: 20px;                padding: 19px;                margin-bottom: 20px;                background-color: #f5f5f5;                border: 1px solid #e3e3e3;                -webkit-border-radius: 4px;                   -moz-border-radius: 4px;                        border-radius: 4px;                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);                   -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);                        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);              }              .container {                  width: 940px;                margin-right: auto;                margin-left: auto;                *zoom: 1;              }                            .alert {                padding: 8px 35px 8px 14px;                margin-bottom: 20px;                text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);                background-color: #fcf8e3;                border: 1px solid #fbeed5;                -webkit-border-radius: 4px;                   -moz-border-radius: 4px;                        border-radius: 4px;              }                            .alert-success {                color: #468847;                background-color: #dff0d8;                border-color: #d6e9c6;              }                            .alert-danger,            .alert-error {              color: #b94a48;              background-color: #f2dede;              border-color: #eed3d7;            }        </style>        <script type="text/javascript">            // Funkce pro zrušení zaškrtnutí            function setVariant0() {                uncheckCheckboxes();            }            // Funkce pro testování Files&Memory            function setVariant1() {                uncheckCheckboxes();                document.getElementById("frm-TestFileUploads").checked=true;                document.getElementById("frm-TestMaximumFileUploads").checked=true;                document.getElementById("frm-TestMaximumUploadFilesize").checked=true;                document.getElementById("frm-TestMemoryLimit").checked=true;                document.getElementById("frm-TestOpenBaseDir").checked=true;                document.getElementById("frm-TestUploadDir").checked=true;            }            // Funkce pro testování Cross-Site            function setVariant2() {                uncheckCheckboxes();                document.getElementById("frm-TestAllowUrlInclude").checked=true;                document.getElementById("frm-TestAllowUrlFopen").checked=true;                document.getElementById("frm-TestExposePHP").checked=true;                document.getElementById("frm-TestRegisterGlobals").checked=true;            }            // Funkce pro testování Errors            function setVariant3() {                uncheckCheckboxes();                document.getElementById("frm-TestDisplayErrors").checked=true;                document.getElementById("frm-TestDisplayStartupErrors").checked=true;                document.getElementById("frm-TestLogErrors").checked=true;                document.getElementById("frm-TestRegisterGlobals").checked=true;            }            // Funkce pro testování All            function setVariant4() {                uncheckCheckboxes();                document.getElementById("frm-TestFileUploads").checked=true;                document.getElementById("frm-TestMaximumFileUploads").checked=true;                document.getElementById("frm-TestMaximumUploadFilesize").checked=true;                document.getElementById("frm-TestMemoryLimit").checked=true;                document.getElementById("frm-TestOpenBaseDir").checked=true;                document.getElementById("frm-TestUploadDir").checked=true;                document.getElementById("frm-TestAllowUrlInclude").checked=true;                document.getElementById("frm-TestAllowUrlFopen").checked=true;                document.getElementById("frm-TestExposePHP").checked=true;                document.getElementById("frm-TestRegisterGlobals").checked=true;                document.getElementById("frm-TestDisplayErrors").checked=true;                document.getElementById("frm-TestDisplayStartupErrors").checked=true;                document.getElementById("frm-TestLogErrors").checked=true;                document.getElementById("frm-TestRegisterGlobals").checked=true;                document.getElementById("frm-TestDisableFunctions").checked=true;                document.getElementById("frm-TestSafeMode").checked=true;                document.getElementById("frm-TestMagicQuotesGPC").checked=true;                document.getElementById("frm-TestMagicQuotesRuntime").checked=true;                document.getElementById("frm-TestUseTransSid").checked=true;            }            function uncheckCheckboxes() {                var inputs = document.getElementsByTagName("input");                for (i = 0; i < inputs.length; i++)                    if (inputs[i].type === "checkbox")                        inputs[i].checked = false;            }        </script>        <div class="container well">            <h1 class="h1"> Test konfigurace PHP serveru </h1>        <?php            if (!empty($_POST["process"]) && $_POST["process"] === "Process") {                $postArray = $_POST;                $array = $application->getReport($postArray);                //echo '<div class="alert alert-error">' . $array["report"] . '</div>';                echo '<div>' . $array["report"] . '</div>';                if ($array["rank"] < 5) {                    echo '<div class="alert alert-error">';                } else if ($array["rank"] < 8) {                    echo '<div class="alert">';                } else {                    echo '<div class="alert alert-success">';                }                echo "<p>Skóre hodnocení testu je: " . $array["rank"] . "</p>" . '</div>';                echo $application->getGenerateForm($postArray);                //echo "<div><p>Test: " . $array["pdfReport"] . "</p>" . '</div>';            } else if (!empty($_POST["generateReport"]) && $_POST["generateReport"] === "Generate") {                header("Location: report.txt");            } else if (!empty($_POST["generateIni"]) && $_POST["generateIni"] === "Generate") {                $stringini = $application->getPhpIni();                @file_put_contents("php.ini", "\xEF\xBB\xBF". $stringini);                header("Location: php.ini");            } else {                echo $application->getForm();            }              ?>        </div>      </body></html>