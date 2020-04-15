<html>
<head>
    <title></title>
</head>
<style>
    div {
        width: 300px;
        height: 100px;
        background: red;
        position: relative;
        animation-name: congrats;
        animation-duration: 10s;
        animation-fill-mode: forwards;
        text-align: center;
    }
    @keyframes congrats {
        from {top: -100px;}
        to {top: 1000px; background-color: blue;}
    }
</style>
<body>
<div><h2>Congrats</h2></div>
<?php

?>
</body>
</html>
