<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="result1">-</div>
</body>
<script type="text/javascript">
    $.ajax({
    url: "http://192.168.209.129:8000/hfdo.php",
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        "Header-Custom-TizenCORS": "OK"
    },
    xhrFields: {
        withCredentials: true
    }
})
.done(function(data) {
    $("#result1").html(JSON.stringify(data));
})
.fail(function(jqXHR, textStatus, errorThrown) {
    console.error("Erreur AJAX:", textStatus, errorThrown);
});
</script>

</html>
