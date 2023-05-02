<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>
    <h1>Hai riceuto una nuova mail dal portale FatturaStudio.it</h1>
    <h2>Di seguito i dettagli</h2>
    <p>
        <strong>name:</strong> {{$fullName}}
    </p>
    <p>
        <strong>Mail address:</strong> {{$fromAddress}}
    </p>
    <p>
        <strong>title:</strong> {{$mailSubtitle}}
    </p>
    <p>
        <strong>body:</strong> {{$mailBody}}
    </p>
</body>
</html>