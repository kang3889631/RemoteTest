<?php
include_once './header.php';

echo GetHeader();
?>
<br>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Demo Notes</h3>
    </div>
    <div class="panel-body">
        <ul>
            <li>The maximum file size for uploads in this demo is <strong>1 MB</strong>.</li>
            <li>The minimum file size for uploads in this demo is <strong>1 KB</strong>.</li>
            <li>Only <strong>PHP, CSS, JavaScript and HTML </strong> are allowed to upload.</li>
            <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage.</li>
            <li>New upload filename should not include extension.</li>
        </ul>
    </div>
</div>


<?php
include_once './footer.php';
?>