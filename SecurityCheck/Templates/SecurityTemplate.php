<?php
    require 'Application/Application.php';
    $application = new Application();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
        <title></title>
    </head>
    <body>
        <style type="text/css">
            
            body {
                margin: 0;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 14px;
                line-height: 20px;
                color: #333333;
                background-color: #ffffff;
              }
              
              h1
              {
                  margin: 10px 0;
                  font-family: inherit;
                  font-weight: bold;
                  line-height: 20px;
                  color: inherit;
             }
            
            .btn {
                display: inline-block;
                *display: inline;
                padding: 4px 12px;
                margin-bottom: 0;
                *margin-left: .3em;
                font-size: 14px;
                line-height: 20px;
                color: #333333;
                text-align: center;
                text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
                vertical-align: middle;
                cursor: pointer;
                background-color: #f5f5f5;
                *background-color: #e6e6e6;
                background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
                background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
                background-repeat: repeat-x;
                border: 1px solid #cccccc;
                *border: 0;
                border-color: #e6e6e6 #e6e6e6 #bfbfbf;
                border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
                border-bottom-color: #b3b3b3;
                -webkit-border-radius: 4px;
                   -moz-border-radius: 4px;
                        border-radius: 4px;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
                filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
                *zoom: 1;
                -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                   -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
              }
              .form-horizontal .control-label {
                float: left;
                width: 160px;
                padding-top: 5px;
                text-align: right;
              }
              
              a {
                color: #0088cc;
                text-decoration: none;
              }

              a:hover,
              a:focus {
                color: #005580;
                text-decoration: underline;
              }
              
                a,
                a:visited {
                  text-decoration: underline;
                }
              
              .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                -webkit-border-radius: 4px;
                   -moz-border-radius: 4px;
                        border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                   -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
              }
              .container {
                  width: 940px;
                margin-right: auto;
                margin-left: auto;
                *zoom: 1;
              }
              
              .alert {
                padding: 8px 35px 8px 14px;
                margin-bottom: 20px;
                text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
                background-color: #fcf8e3;
                border: 1px solid #fbeed5;
                -webkit-border-radius: 4px;
                   -moz-border-radius: 4px;
                        border-radius: 4px;
              }
              
              .alert-success {
                color: #468847;
                background-color: #dff0d8;
                border-color: #d6e9c6;
              }
              
              .alert-danger,
            .alert-error {
              color: #b94a48;
              background-color: #f2dede;
              border-color: #eed3d7;
            }

        </style>
        <script type="text/javascript">
            // Funkce pro zrušení zaškrtnutí
            function setVariant0() {
                uncheckCheckboxes();
            }
            // Funkce pro testování Files&Memory
            function setVariant1() {
                uncheckCheckboxes();
                document.getElementById("frm-TestFileUploads").checked=true;
                document.getElementById("frm-TestMaximumFileUploads").checked=true;
                document.getElementById("frm-TestMaximumUploadFilesize").checked=true;
                document.getElementById("frm-TestMemoryLimit").checked=true;
                document.getElementById("frm-TestOpenBaseDir").checked=true;
                document.getElementById("frm-TestUploadDir").checked=true;
            }
            // Funkce pro testování Cross-Site
            function setVariant2() {
                uncheckCheckboxes();
                document.getElementById("frm-TestAllowUrlInclude").checked=true;
                document.getElementById("frm-TestAllowUrlFopen").checked=true;
                document.getElementById("frm-TestExposePHP").checked=true;
                document.getElementById("frm-TestRegisterGlobals").checked=true;
            }
            // Funkce pro testování Errors
            function setVariant3() {
                uncheckCheckboxes();
                document.getElementById("frm-TestDisplayErrors").checked=true;
                document.getElementById("frm-TestDisplayStartupErrors").checked=true;
                document.getElementById("frm-TestLogErrors").checked=true;
                document.getElementById("frm-TestRegisterGlobals").checked=true;
            }
            // Funkce pro testování All
            function setVariant4() {
                uncheckCheckboxes();
                document.getElementById("frm-TestFileUploads").checked=true;
                document.getElementById("frm-TestMaximumFileUploads").checked=true;
                document.getElementById("frm-TestMaximumUploadFilesize").checked=true;
                document.getElementById("frm-TestMemoryLimit").checked=true;
                document.getElementById("frm-TestOpenBaseDir").checked=true;
                document.getElementById("frm-TestUploadDir").checked=true;
                document.getElementById("frm-TestAllowUrlInclude").checked=true;
                document.getElementById("frm-TestAllowUrlFopen").checked=true;
                document.getElementById("frm-TestExposePHP").checked=true;
                document.getElementById("frm-TestRegisterGlobals").checked=true;
                document.getElementById("frm-TestDisplayErrors").checked=true;
                document.getElementById("frm-TestDisplayStartupErrors").checked=true;
                document.getElementById("frm-TestLogErrors").checked=true;
                document.getElementById("frm-TestRegisterGlobals").checked=true;
                document.getElementById("frm-TestDisableFunctions").checked=true;
                document.getElementById("frm-TestSafeMode").checked=true;
                document.getElementById("frm-TestMagicQuotesGPC").checked=true;
                document.getElementById("frm-TestMagicQuotesRuntime").checked=true;
                document.getElementById("frm-TestUseTransSid").checked=true;
            }
            function uncheckCheckboxes() {
                var inputs = document.getElementsByTagName("input");
                for (i = 0; i < inputs.length; i++)
                    if (inputs[i].type === "checkbox")
                        inputs[i].checked = false;
            }
        </script>
        <div class="container well">
            <h1 class="h1"> Test konfigurace PHP serveru </h1>
        <?php
            if (!empty($_POST["process"]) && $_POST["process"] === "Process") {
                $postArray = $_POST;
                $array = $application->getReport($postArray);
                //echo '<div class="alert alert-error">' . $array["report"] . '</div>';
                echo '<div>' . $array["report"] . '</div>';
                if ($array["rank"] < 5) {
                    echo '<div class="alert alert-error">';
                } else if ($array["rank"] < 8) {
                    echo '<div class="alert">';
                } else {
                    echo '<div class="alert alert-success">';
                }
                echo "<p>Skóre hodnocení testu je: " . $array["rank"] . "</p>" . '</div>';
                echo $application->getGenerateForm($postArray);
                //echo "<div><p>Test: " . $array["pdfReport"] . "</p>" . '</div>';
            } else if (!empty($_POST["generateReport"]) && $_POST["generateReport"] === "Generate") {
                header("Location: report.txt");
            } else if (!empty($_POST["generateIni"]) && $_POST["generateIni"] === "Generate") {
                $postArray = $_POST;
                $stringini = $application->getPhpIni($postArray);
                @file_put_contents("php.ini", "\xEF\xBB\xBF". $stringini);
                header("Location: php.ini");
            } else {
                echo $application->getForm();
            }      
        ?>
        </div>  
    </body>
</html>
