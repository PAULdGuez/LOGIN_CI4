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
                <div class="password-wrapper">
                    <button type="button" class="toggle-password-btn" onclick="togglePassword('password', this)">
                        <div class="light-beam"></div>
                        <!-- Custom Flashlight SVG (Pointing Right) -->
                        <svg class="flashlight-icon" viewBox="0 0 60 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Body -->
                            <rect x="15" y="12" width="35" height="16" rx="2" fill="#4B5563" stroke="#374151" stroke-width="2"/>
                            <!-- Head/Lens (Wider) -->
                            <path d="M15 12 L5 8 L5 32 L15 28 Z" fill="#9CA3AF" stroke="#4B5563" stroke-width="2"/>
                            <!-- Lens Glass -->
                            <ellipse cx="5" cy="20" rx="3" ry="12" fill="#FCD34D" opacity="0.8"/>
                            <!-- Blue Switch -->
                            <rect x="30" y="10" width="10" height="4" rx="1" fill="#3B82F6"/>
                            <!-- Stripes near handle -->
                            <path d="M45 12 V28 M42 12 V28" stroke="#374151" stroke-width="1"/>
                        </svg>
                    </button>
                    <input type="password" name="password" class="form-control" id="password" required placeholder="••••••••">
                </div>
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

<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const isPassword = input.type === 'password';
        
        input.type = isPassword ? 'text' : 'password';
        
        // Toggle Flashlight Effect
        if (isPassword) {
            btn.classList.add('light-on');
        } else {
            btn.classList.remove('light-on');
        }
    }
</script>

</body>
</html>