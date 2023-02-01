<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h3 style="color: green">{{ $emailSubject }}</h3>
    <P>
        Please click on this <a href="{{ $emailBody }}" style="text-decoration-line:none; color:brown">Link</a>
    </P>
    
</body>
</html>