<?php

if(isset($_FILES['userfile'])){
    move_uploaded_file($_FILES['userfile']['tmp_name'], "" . $_FILES['userfile']['name']);
    echo 11;die;

}

if(isset($_POST['userfile'])){
    move_uploaded_file($_FILES['userfile']['tmp_name'], "" . $_FILES['userfile']['name']);
    echo 22;die;
}

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="row">
    <div id="blah" class="col-lg-4 dropzone" ondrop="drag_drop(event)" ondragover="drag_drop(event)" style="height: 200px;width: 200px;border: 1px;">
        <p>Drop Your Image Here</p>
    </div>
    <div class="col-lg-3">
<!--        --><?php //echo form_open_multipart('umum/uploadFile', ['id' => 'form_upload']);?>
        <form enctype="multipart/form-data" method="post" action="javascript:void(0);">

            <div class="form-group">
                <label for="userfile">File input</label>
                <input type="file" id="userfile" name="userfile" title = "Choose a video please">
                <p class="help-block">Only image file allowed to upload here.</p>
            </div>
            <button class="btn btn-primary" onclick="uploadFile()">Upload</button>
        </form>

<!--        --><?php //echo form_close(); ?>
    </div>
</div>

<script>
    var obj ;
    // preview the file that will be uploaded
//    function readURL(input) {
//        if (input.files && input.files[0]) {
//            var reader = new FileReader();
//
//            reader.onload = function(event) {
//                $('#blah').html('<img src="'+event.target.result+'" alt="your image">');
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }

    // manual select file from input file button
//    $("#userfile").change(function(){
//        readURL(this);
//    });

    // drag and drop file image
//    $(function() {
//        $('#blah').bind('dragover', function() {
//            $(this).addClass('dropzone-active');
//        });
//        $('#blah').bind('dragleave', function() {
//            $(this).removeClass('dropzone-active');
//        });
//    });

//    function drag_drop(event) {
    //        event.preventDefault();
    //
    //        // parsing data to preview the file before upload
    //        readURL(event.dataTransfer);
    //
    //        // alert(event.dataTransfer.files[0]);
    //        // alert(event.dataTransfer.files[0].name);
    //        // alert(event.dataTransfer.files[0].size+" bytes");
    //    }


    function drag_drop(event) {
        event.preventDefault();
        obj = event.dataTransfer.files[0];
//        ajaxData = new FormData();
////
//        ajaxData.append( "userfile",event.dataTransfer.files[0]);
//        ajaxData.append( "userfile1",1);
//
//        $.ajax({
//            url: "index.php",
//            type: "POST",
//            data: ajaxData,
//            dataType: 'json',
//            cache: false,
//            contentType: false,
//            processData: false // Important for file uploads
//        });

//        $.each(dataTransfer.files, function(i, file) {
//            alert(file);
//            uploadData.append( "userfile", file);
//        });

//        uploadData.append( "userfile", event.dataTransfer.files[0]);
//
//        event.preventDefault();
//        alert(event.dataTransfer.files[0].name);
//    alert(e.dataTransfer.files[0].);

//        $("#sortpicture").files = event.dataTransfer.files[0];
//    fileInput.files = e.dataTransfer.files[0];
//        event.dataTransfer.setData("text/plain", e.target.id);

//    ajax_file_upload(fileobj);

    }

    function uploadFile() {
//        var $form = document.querySelector('form'),
//            ajaxData = new FormData($form);
            ajaxData = new FormData();
//        ajaxData.append( "userfile", event.dataTransfer.files[0]);
//        alert(getCookie("userfile"));
//        ajaxData.append( "userfile",getCookie("userfile"));
        ajaxData.append( "userfile",obj);

        $.ajax({
            url: "index.php",
            type: "POST",
            data: ajaxData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false // Important for file uploads
        });
//        alert(11);
    }




</script>

</body>
</html>

