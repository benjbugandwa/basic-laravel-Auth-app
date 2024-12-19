<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Notifica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #1c457a;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .content {
            padding: 20px;
            text-align: left;
        }

        .footer {
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">

            <h1>Reinitialisation du mot de passe</h1>
        </div>
        <div class="content">
            <p>Bonjour, {{ $user->name }} !</p>
            <p>Vous recevez ce message parce que vous avez demander la réinitialisation de votre mot de passe</p>
            <p>Cliquez sur le lien ci dessous pour procéder à la réinitialisation de votre mot de passe</p>
            <a href="{{ url('password/reset', $user->remember_token) }}">Changer mon mot de passe</a>
            <p>Si vous n'avez pas demandé la réinitialisation de votre mot de passe, veuillez ignorer ce message</p>
            <p>Cordialement,<br><b>Protection civile RDC/Cluster protection RDC</b></p>
        </div>

        <div class="footer">
            <p>© 2024 AlertBook. Tous droits reservés</p>
        </div>
    </div>
</body>

</html>
