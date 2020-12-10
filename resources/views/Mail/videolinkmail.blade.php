<!DOCTYPE html>
<html>

<head>
    <title>Find A doctor</title>
    <style>
        .button {
            display: block;
            width: 115px;
            height: 25px;
            background: #ee0505;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            line-height: 25px;
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <h3>This is your meeting link: {{ $link }} <a id="button" class="button" href="{{ $link }}">Click here</a></h3>
    <p>Thank you for believing in us.</p>
</body>

</html>
