<html>

<head>
    <link type="text/css" rel="stylesheet" href="preview_style.css" />
    <script type="ckeditor/ckeditor.js"></script>
    <!-- <script type="text/javascript" src="jquery.js"></script> -->
   <!--  <script type="text/javascript">
    function preview() {
        $("#preview_div").html($("#text").val());
    }
    </script> -->
</head>

<body>
   <!--  <div id="wrapper">
        <textarea id="text" onkeyup="preview();" placeholder="Enter Text Or Code"></textarea>
        <div id="preview_div"></div>
    </div> -->


    <div class="container">
        <textarea name="content"></textarea>
    </div>

    <script>
        CKEDITOR.replace('content');
    </script> 
</body>

</html>