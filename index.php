<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Basic Plus Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */
-->
<?php
include_once './header.php';
?>

    <?php echo GetHeader(); ?>
    <br>
    <br>
    <div class="container">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
        </span>
        <br>
        <br>
        <!-- The global progress bar -->
        <div id="progress" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>

        <!-- The container for the uploaded files -->

        <div id="myUploadForm">
            <div id="files" class="files"></div>
        </div>
        <br>
    </div>
    
    
    <script src="/steven/js/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="/steven/js/jquery.ui.widget.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="/steven/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="/steven/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="/steven/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/steven/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/steven/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="/steven/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="/steven/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="/steven/js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="/steven/js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="/steven/js/jquery.fileupload-validate.js"></script>

    <script src="/steven/js/steven-upload.js"></script>
    
<?php
include_once './footer.php';
?>