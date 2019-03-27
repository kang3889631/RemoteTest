<?php

$DBFile = 'db.txt';

$fileObj = [
    'fileName' => $_GET['name'],
    'fileSize' => $_GET['size'],
];
    
SaveRecord($fileObj);


$data = GetData();

echo '<pre>';
print_r($data);
echo '</pre>';


function SaveRecord($row) {
    global $DBFile;
    
    $data = GetData();
    
    // Append new row
    $data[] = $row;
    
    return file_put_contents($DBFile, serialize($data));
}

/*
 * Return: PHP array
 */
function GetData() {
    global $DBFile;
    
    $data = file_get_contents($DBFile);
    
    if (empty($data)) {
        return [];
    }
    
    return unserialize($data);
}