<?php

require './vendor/autoload.php';

$xlsxArray = $Xlsxtojson->parseXlsx('path_to_file_on_server.xlsx');
print print_r($xlsxArray,1);

$xlsxArray = $Xlsxtojson->postXlsx('path_to_file.xlsx');
print print_r($xlsxArray,1);