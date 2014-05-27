<?php
include 'Application\Application.php';

$application = new Application();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet">  
        <title></title>
    </head>
    <body>
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

        
        if ($application->getForm()->isSuccess()) {
            $array = $application->getReport();
            echo '<div class="alert alert-error">' . $array["report"] . '</div>';
            
            if ($array["rank"] < 5) {
                echo '<div class="alert alert-error">';
            } else if ($array["rank"] < 8) {
                echo '<div class="alert">';
            } else {
                echo '<div class="alert alert-success">';
            }
            echo "<p>Skóre hodnocení testu je: " . $array["rank"] . "</p>" . '</div>';
            
            
            //echo dump($arr);
            //echo dump($application->getForm()->getValues());
        } else {
            
            echo $application->getForm();
        }
        
        ?>
        </div>
        <script src="Bootstrap/jquery/jquery-1.9.1.min.js"></script>
        <script src="Bootstrap/js/bootstrap.js"></script>
        
    </body>
</html>
