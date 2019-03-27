/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function() {
    'use strict';

    var uploadButton = $('<button/>')
        .addClass('btn btn-primary')
        .prop('disabled', true)
        .text('Processing...')
        .on('click', function() {

            //var dataorigfilename = $(this).attr('dataorigfilename');
            //console.log('dataorigfilename: ' + dataorigfilename);
            //return false;

            var $this = $(this);
            var data = $this.data();

            //console.log(data);

            $this
                .off('click')
                .text('Abort')
                .on('click', function() {
                    $this.remove();
                    data.abort();
                });

            data.submit().always(function() {
                $this.remove();
            });
        });


    $('#fileupload').fileupload({
            url: '/steven/upload.php',
            dataType: 'json',
            autoUpload: false,
            acceptFileTypes: /(\.|\/)(php|css|js|html)$/i,
            maxFileSize: 1000000,
            minFileSize: 1000,
            formData: function(form) {
                var data = [];
                $('#myUploadForm input[name^="fileNameCustom"]').each(function() {
                    var dataOrigfilename = $(this).attr('dataOrigfilename');
                    var dataNewfilename = $(this).val();
                    
                    //console.log(dataOrigfilename);

                    data.push({
                        name: dataOrigfilename,
                        value: dataOrigfilename + '||' + dataNewfilename,
                    });
                });
                return data;
            },

        }).on('fileuploadadd', function(e, data) {

            data.context = $('<div/>').appendTo('#files');

            $.each(data.files, function(index, file) {

                var node = $('<p/>')
                    .append($('<span/>').text(file.name))
                    .append('<br>')
                    .append($('<input>', {
                        type: 'text',
                        val: '',
                        name: 'fileNameCustom[]',
                        dataOrigFileName: file.name,
                    }));

                if (!index) {
                    var uploadButtonClone = uploadButton.clone(true);
                    uploadButtonClone.attr('dataOrigFileName', file.name);

                    node.append('<br>')
                        .append(uploadButtonClone.data(data));
                }
                node.appendTo(data.context);
            });
        }).on('fileuploadprocessalways', function(e, data) {
            console.log(data);
            var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
            if (file.preview) {
                node
                    .prepend('<br>')
                    .prepend(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
            }

        }).on('fileuploadprogressall', function(e, data) {
        
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            //location.reload();
        }).on('fileuploaddone', function(e, data) {

            if (data.result.errorArr.length > 0) {
                var html = '<span>' + data.result.errorArr[0] + '</span>';
                $(data.context.children()[0]).wrap(html);
            }else{
                //location.reload();
            }

        }).on('fileuploadfail', function(e, data) {

            $.each(data.files, function(index) {
                var error = $('<span class="text-danger"/>').text('File upload failed.');
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            });
        }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});