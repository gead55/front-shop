<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Welcome</div>
<?php
    $datetime1 = date_create('1981-10-12');
    $datetime2 = date_create();
    $interval = date_diff($datetime1, $datetime2);
    $since = date_format($datetime1, 'Y-m-d');
    $until = date_format($datetime2, 'Y-m-d');
    $total = $interval->format('%R%a days');
?>
            <div class="content">Since {{$since}} - {{$until}} Total : {{$total}}</div>
            </div>
        </div>
    </body>
</html>
