<?php
//echo phpinfo();

if(empty($_GET['new'])||empty($_GET['ori'])){
    echo "No input";
    exit;
}

$newName = $_GET['new'];
$oldName = $_GET['ori'];

if ($newName === $oldName) {
    $newFileName = substr($oldName, 0, strrpos($oldName, '.')) . '_' . date("M,d,Y h:i:s") . substr($oldName, strrpos($oldName, '.'));
} else {
    $newTitle    = substr($newName, 0, strrpos($newName, '.'));
    $newFileName = $newTitle . '_' . substr($oldName, 0, strrpos($oldName, '.')) . '_' . date("M,d,Y h:i:s") . substr($oldName, strrpos($oldName, '.'));
}


$file = $_SERVER["DOCUMENT_ROOT"] . '/steven/uploads/' . $newName;

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $newFileName . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} else {
    echo 'file not found';
    exit;
}
