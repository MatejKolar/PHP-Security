<?php

$sLibraryPath = '../CompiledPHAR/SecurityCheck_compiled.phar';

if (file_exists($sLibraryPath)) {
    @unlink($sLibraryPath);
}

if (file_exists($sLibraryPath . ".gz")) {
    @unlink($sLibraryPath . ".gz");
}
	 
if (! file_exists($sLibraryPath)) {
    
    ini_set("phar.readonly", 0); // Could be done in php.ini

    $oPhar = new Phar($sLibraryPath); // creating new Phar
    $oPhar->setDefaultStub('index.php', '../SecurityCheck/index.php'); // pointing main file which require all classes
    $oPhar->buildFromDirectory('../SecurityCheck/'); // creating our library using whole directory

    $oPhar->compress(Phar::GZ); // plus - compressing it into gzip
}

?>