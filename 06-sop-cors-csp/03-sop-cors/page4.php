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
            url: "http://192.168.180.136:8000/hello_from_different_origin.php",
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                "Header-Custom-TizenCORS": "OK"
            }
        })
        .done(function(data) {
            $("#result1").html(data);
        });
</script>

</html>