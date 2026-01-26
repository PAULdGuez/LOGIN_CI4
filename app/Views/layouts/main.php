<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - IT Green</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="mb-4">
                <div class="logo-text">IT <span>green.</span></div>
            </div>
            
            <nav>
                <a href="<?= site_url('dashboard') ?>" class="nav-link active">
                    Dashboard
                </a>
                <a href="#" class="nav-link">
                    Reportes
                </a>
                <a href="#" class="nav-link">
                    Configuración
                </a>
                <a href="<?= site_url('logout') ?>" class="nav-link" style="margin-top: auto;">
                    Cerrar Sesión
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h2><?= $this->renderSection('title') ?></h2>
                <div class="user-profile">
                    <span class="text-muted">Admin User</span>
                </div>
            </header>

            <?= $this->renderSection('content') ?>
        </main>
    </div>
</body>
</html>
