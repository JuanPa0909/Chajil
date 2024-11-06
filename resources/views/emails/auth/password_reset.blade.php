<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <div style="background-color: #004d40; padding: 20px; text-align: center;">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo de la Institución" style="max-width: 150px; margin-bottom: 20px;">
            <h2 style="color: #ffffff; margin: 0;">Recuperación de Contraseña</h2>
        </div>
        <div style="padding: 20px;">
            <p>Hola,</p>
            <p>Has recibido este correo porque hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta.</p>
            <div style="text-align: center; margin: 20px 0;">
                <a href="{{ $actionUrl }}" style="background-color: #004d40; color: #ffffff; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">Restablecer Contraseña</a>
            </div>
            <p>Este enlace de restablecimiento de contraseña expirará en 60 minutos.</p>
            <p>Si tú no solicitaste un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.</p>
            <p>Saludos,<br>El equipo de Chajil Siwan</p>
        </div>
    </div>
</body>
</html>
