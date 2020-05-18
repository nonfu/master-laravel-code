<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hello</title>
    <style>
        h1 {
            background-color: #f4645f;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
    </style>
</head>
<body>
<h1 id="h1"><?="你好，PHP！"?></h1>
<script>
    var h1Element = document.getElementById("h1")
    h1Element.onclick = function () {
        alert("该页面由学院君通过 PHP + HTML 实现");
    }
</script>
</body>
</html>
