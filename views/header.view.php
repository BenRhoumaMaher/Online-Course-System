<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <style>
    .cl {
        margin: 5px;
        display: inline-block;
        vertical-align: top;
        width: 300px;
        height: 100px;
        border: 1px solid #ccc;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquer
y.min.js"></script>
    <script>
    $(document).ready(function() {
        if ($(window).width() > 600)
            $("ul").show();
        else
            $("ul").hide();
        $("button").click(function() {
            $("ul").slideToggle();
        });
    });
    </script>
</head>