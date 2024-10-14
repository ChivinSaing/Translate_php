<?php
include('../helper.php');
   
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true); // Decode the JSON payload
    $text = $data['text']; // Access the text property
    // echo '' . $text . '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <h1><?= __('Contact Uss') ?></h1>
    <form action="">
        <select name="lang" id="lang">
            <option <?php echo isset($_GET['lang']) && $_GET['lang']=="en"?'selected':'' ?> value="en">english</option>
            <option <?php echo isset($_GET['lang']) && $_GET['lang']=="ja"?'selected':'' ?> value="ja">Japan</option>
            <option <?php echo isset($_GET['lang']) && $_GET['lang']=="ch"?'selected':'' ?> value="ch">Chinese</option>
        </select>
    </form>
</body>
<script>
    var text = document.querySelector('h1');
    var select = document.querySelector('#lang');
    var form  =document.querySelector('form');
    var btnSubmit =document.querySelector('button');
    var send = {}
    select.addEventListener('change',function(event){
        var curUrl=window.location.href.split('?')[0]
        var targetUrl = curUrl + "?lang=" + select.value;
        window.location.href= targetUrl;
    });
</script>
</html>

