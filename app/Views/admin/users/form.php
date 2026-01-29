<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= isset($user) ? 'Editar Usuario' : 'Nuevo Usuario' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div style="max-width: 600px; margin: 0 auto;">
    <div class="header">
        <div>
            <h2 class="mb-1"><?= isset($user) ? 'Editar Usuario' : 'Crear Nuevo Usuario' ?></h2>
            <p class="text-muted">Completa los datos del usuario.</p>
        </div>
        <a href="<?= site_url('admin/users') ?>" class="btn btn-outline">Volver</a>
    </div>

    <!-- Mensajes de Error de Validación -->
    <?php if (isset($validation) && is_object($validation)): ?>
        <div style="color: #fca5a5; margin-bottom: 1rem;">
            <?= $validation->listErrors() ?>
        </div>
    <?php elseif(isset($validation) && is_array($validation)): ?>
        <?php foreach($validation as $error): ?>
             <div style="color: #fca5a5; margin-bottom: 0.5rem;">• <?= $error ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="card">
        <form action="<?= isset($user) ? site_url('admin/users/update/' . $user['id']) : site_url('admin/users/create') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= isset($user) ? $user['email'] : old('email') ?>" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <div class="password-wrapper">
                    <button type="button" class="toggle-password-btn" onclick="togglePassword('password', this)">
                        <div class="light-beam"></div>
                        <svg class="flashlight-icon" viewBox="0 0 60 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="12" width="35" height="16" rx="2" fill="#4B5563" stroke="#374151" stroke-width="2"/>
                            <path d="M15 12 L5 8 L5 32 L15 28 Z" fill="#9CA3AF" stroke="#4B5563" stroke-width="2"/>
                            <ellipse cx="5" cy="20" rx="3" ry="12" fill="#FCD34D" opacity="0.8"/>
                            <rect x="30" y="10" width="10" height="4" rx="1" fill="#3B82F6"/>
                            <path d="M45 12 V28 M42 12 V28" stroke="#374151" stroke-width="1"/>
                        </svg>
                    </button>
                    <input type="password" name="password" id="password" class="form-control" placeholder="<?= isset($user) ? 'Dejar en blanco para mantener actual' : 'Mínimo 6 caracteres' ?>">
                </div>
                <?php if(isset($user)): ?>
                    <small class="text-muted" style="font-size: 0.8rem;">Solo llena este campo si deseas cambiar la contraseña.</small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="role" class="form-label">Rol</label>
                <select name="role" id="role" class="form-control">
                    <option value="user" <?= (isset($user) && $user['role'] == 'user') ? 'selected' : '' ?>>Usuario</option>
                    <option value="admin" <?= (isset($user) && $user['role'] == 'admin') ? 'selected' : '' ?>>Administrador</option>
                </select>
            </div>

            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-primary">
                    <?= isset($user) ? 'Guardar Cambios' : 'Crear Usuario' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const isPassword = input.type === 'password';
        
        input.type = isPassword ? 'text' : 'password';
        
        if (isPassword) {
            btn.classList.add('light-on');
        } else {
            btn.classList.remove('light-on');
        }
    }
</script>
<?= $this->endSection() ?>
