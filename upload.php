<?php
include $_SERVER["DOCUMENT_ROOT"] . '/steven/src/class.uploader.php';

$DBFile = 'db.txt';
$outArr = [
    'status' => false,
    'errorArr' => [],
];

$arr = [];

if (empty($_FILES)) {
    exitPrintErr('$_FILES is empty');
}

if (!empty($_POST)) {
	$arr = $_POST;
    //file_put_contents('debug.txt', serialize($arr));
}

foreach($arr as $k => $v) {
	list($oldName, $newName) = explode('||', $v);
}

$fileObj = [
    'newName' => $newName,
    'oldName' => $oldName,
];

$uploader = new Uploader();
$data = $uploader->upload($_FILES['files'], array(
	'limit' => 10, //Maximum Limit of files. {null, Number}
	'maxSize' => 1, //Maximum Size of files {null, Number(in MB's)}
	'extensions' => ['php',	'html',	'css',	'js'], //Only allow ['php',	'html',	'css',	'js']
	'required' => true, //Minimum one file is required for upload {Boolean}
	'uploadDir' => 'uploads/', //Upload directory {String}
	'title' => $newName, //array('auto', 10), //New file name {null, String, Array} *please read documentation in README.md
	'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
	'replace' => false, //Replace the file if it already exists  {Boolean}
	'perms' => null, //Uploaded file permisions {null, Number}
	'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
	'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
	'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
	'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
	'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
	'onRemove' => 'onFilesRemoveCallback'

	// A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
));

if ($data['isComplete']) {
	$files = $data['data'];
}

if ($data['hasErrors']) {
	$errors = $data['errors'];
    
	if (!empty($errors[0]) && is_array($errors[0])) {
		foreach($errors[0] as $err) {
			$outArr['errorArr'][] = $err;
		}
	}
}

if (empty($outArr['errorArr'])) {
	$outArr['status'] = true;
    SaveRecord($fileObj);
}

echo json_encode($outArr);

function onFilesRemoveCallback($removed_files)
{
	foreach($removed_files as $key => $value) {
		$file = $_SERVER["DOCUMENT_ROOT"] . '/steven/uploads/' . $value;
		if (file_exists($file)) {
			unlink($file);
		}
	}

	return $removed_files;
}

function SaveRecord($row)
{
	global $DBFile;
	$data = GetData();
	$data[] = $row;
	return file_put_contents($DBFile, serialize($data));
}

function GetData()
{
	global $DBFile;
	$data = file_get_contents($DBFile);
	if (empty($data)) {
		return [];
	}

	return unserialize($data);
}

function exitPrintErr($err) {
    global $outArr;
    
    $outArr['errorArr'][] = $err;
    echo json_encode($outArr);    
    exit;
}
