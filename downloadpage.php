<?php
include_once './header.php';
?>

    <?php echo GetHeader(); ?>
<div class="container">
        <table class="table">
        <tr><th>Savedname</th><th>Oldname</th><th>Download Link</th>

<?php
$DBFile = 'db.txt';
$data = file_get_contents($DBFile);
if(!empty($data)){
    $data = GetData();
    foreach($data as $row) {
        $oldName = $row['oldName'];
        $newName = $row['newName'];
        if (empty($newName)) {
            $newName = $oldName;
        }
        else {
            $newName = $row['newName'] . substr($oldName, strrpos($oldName, '.'));
        }
        echo "<tr><th>$newName</th><th>$oldName</th><th><a href='/steven/download.php?ori={$oldName}&new={$newName}'>Download</a></th></tr>";
        echo "<br/>";
    }
}


function GetData()
{
	global $DBFile;
	$data = file_get_contents($DBFile);
	return unserialize($data);
}

?>
    </table>
    </div>