<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IT Green</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="auth-wrapper">

<div class="auth-card animated fadeIn">
    <div class="auth-header">
        <div class="logo-text">IT <span>green.</span></div>
    </div>

    <div class="card">
        <h3 class="text-center mb-4">Iniciar Sesión</h3>

        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger">
               <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>

        <form action="<?= base_url('/auth/check') ?>" method="post">
            
            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus placeholder="ejemplo@itgreen.com">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password" required placeholder="••••••••">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Ingresar</button>
            </div>
        </form>
    </div>
    
    <div class="text-center mt-3 text-muted" style="font-size: 0.9rem;">
        &copy; <?= date('Y') ?> IT Green. Todos los derechos reservados.
    </div>
</div>

</body>
</html>