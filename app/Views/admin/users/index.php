<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Administrar Usuarios
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    /* Estilos base para transición suave */
    .user-management-container {
        transition: all 0.5s ease;
        padding: 1.5rem;
        border-radius: var(--radius-md);
    }

    /* DEV MODE STYLES */
    .dev-mode {
        background-color: #050a08;
        border: 1px solid var(--color-primary);
        box-shadow: 0 0 20px rgba(140, 198, 63, 0.2);
        font-family: 'Courier New', Courier, monospace;
    }

    .dev-mode h2, .dev-mode p, .dev-mode th, .dev-mode td {
        text-shadow: 0 0 5px rgba(140, 198, 63, 0.5);
    }

    .dev-mode .table {
        border-color: var(--color-primary);
    }

    .dev-mode .table th {
        color: var(--color-primary);
        border-bottom: 2px solid var(--color-primary);
    }

    .dev-mode .table td {
        border-bottom: 1px solid #1a362f;
        color: #e0e0e0;
    }

    /* Botones ocultos por defecto */
    .hidden-actions {
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .dev-mode .hidden-actions {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Botones 3D en Dev Mode */
    .dev-mode .btn-3d {
        position: relative;
        top: 0;
        transition: all 0.1s;
        box-shadow: 0 5px 0 #1a362f; /* Sombra sólida para efecto 3D */
        margin-bottom: 5px; /* Espacio para la sombra */
    }

    .dev-mode .btn-3d:active {
        top: 3px;
        box-shadow: 0 2px 0 #1a362f;
    }

    /* Toggle Switch */
    .switch-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: var(--color-primary);
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }
</style>

<div class="header">
    <div>
        <h2 class="mb-1">Administración de Usuarios</h2>
        <p class="text-muted">Gestión centralizada de cuentas.</p>
    </div>
    
    <div class="switch-container">
        <span class="text-muted" id="mode-label">Modo Visualización</span>
        <label class="switch">
            <input type="checkbox" id="devModeToggle">
            <span class="slider"></span>
        </label>
    </div>
</div>

<div id="usersPanel" class="user-management-container card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h3 id="panelTitle">Lista de Usuarios</h3>
        <button class="btn btn-primary hidden-actions btn-3d" onclick="confirmAction('agregar')">
            + Agregar Usuario
        </button>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th class="hidden-actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($users)): ?>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td>#<?= $user['id'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <span class="badge <?= $user['role'] == 'admin' ? 'badge-warning' : 'badge-success' ?>">
                                <?= ucfirst($user['role']) ?>
                            </span>
                        </td>
                        <td class="hidden-actions">
                            <button class="btn btn-outline btn-sm btn-3d" style="margin-right: 5px;" onclick="confirmAction('editar', <?= $user['id'] ?>)">Editar</button>
                            <button class="btn btn-danger btn-sm btn-3d" onclick="confirmAction('borrar', <?= $user['id'] ?>)">Borrar</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- SweetAlert2 for confirmations -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const toggle = document.getElementById('devModeToggle');
    const panel = document.getElementById('usersPanel');
    const label = document.getElementById('mode-label');
    const title = document.getElementById('panelTitle');

    toggle.addEventListener('change', function() {
        if(this.checked) {
            panel.classList.add('dev-mode');
            label.innerText = "MODO DESARROLLADOR [ON]";
            label.style.color = "var(--color-primary)";
            label.style.fontWeight = "bold";
            title.innerText = "> SYSTEM_USERS_TABLE";
        } else {
            panel.classList.remove('dev-mode');
            label.innerText = "Modo Visualización";
            label.style.color = "var(--color-text-muted)";
            label.style.fontWeight = "normal";
            title.innerText = "Lista de Usuarios";
        }
    });

    function confirmAction(action, id = null) {
        let title, text, icon, confirmButtonText, targetUrl;

        // Base URL helper from PHP
        const baseUrl = '<?= site_url('admin/users') ?>';

        if (action === 'borrar') {
            title = '¿Eliminar Usuario?';
            text = "Esta acción no se puede deshacer.";
            icon = 'warning';
            confirmButtonText = 'Sí, borrar!';
            targetUrl = `${baseUrl}/delete/${id}`;
        } else if (action === 'editar') {
            title = '¿Editar Usuario?';
            text = "Entrarás al modo de edición.";
            icon = 'info';
            confirmButtonText = 'Ir a editar';
            targetUrl = `${baseUrl}/edit/${id}`;
        } else {
            // Agregar
            title = '¿Agregar Nuevo Usuario?';
            text = "Se abrirá el formulario de registro.";
            icon = 'question';
            confirmButtonText = 'Continuar';
            targetUrl = `${baseUrl}/new`;
        }

        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: '#8cc63f',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmButtonText,
            background: '#1a362f',
            color: '#fff'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirección real
                window.location.href = targetUrl;
            }
        });
    }
</script>
<?= $this->endSection() ?>
