<?php
$output = "";
// Get all Tests
$Directory = new RecursiveDirectoryIterator('..\\SecurityCheck\\Test\\');
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($Regex as $fileReg)
{
    $output .= file_get_contents($fileReg[0]);
}

// Get Application
$Directory = new RecursiveDirectoryIterator('..\\SecurityCheck\\Application\\');
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($Regex as $fileReg)
{
    $output .= file_get_contents($fileReg[0]);
}

// Get Template
$Directory = new RecursiveDirectoryIterator('..\\SecurityCheck\\Templates\\');
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($Regex as $fileReg)
{
    $output .= file_get_contents($fileReg[0]);
}

$arrayOutput = explode("\n", $output);
$output = "";
foreach ($arrayOutput as $line)
{
    if (!strstr($line, "require"))
        $output .= $line;
}
file_put_contents("../CompiledPHP/SecurityCheck_min.php", $output);

?>
