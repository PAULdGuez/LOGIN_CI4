<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Mi Perfil
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row" style="display: flex; gap: 2rem; flex-wrap: wrap;">
    <!-- Main Column -->
    <div style="flex: 2; min-width: 300px;">
        <!-- Welcome Card -->
        <div class="card mb-4" style="background: linear-gradient(to right, var(--color-bg-card), rgba(26, 54, 47, 0.5)); border-left: 4px solid var(--color-primary);">
            <h2 class="mb-2">Hola, <?= session()->get('email') ?? 'Usuario' ?> 👋</h2>
            <p class="text-muted">Bienvenido de nuevo a tu panel personal.</p>
        </div>

        <!-- Quick Actions -->
        <h3 class="mb-3" style="font-size: 1.2rem;">Acciones Rápidas</h3>
        <div class="action-grid mb-4">
            <div class="action-card">
                <div style="font-size: 2rem; margin-bottom: 0.5rem;">📅</div>
                <h4 style="font-size: 1rem;">Agendar Cita</h4>
            </div>
            <div class="action-card">
                <div style="font-size: 2rem; margin-bottom: 0.5rem;">📂</div>
                <h4 style="font-size: 1rem;">Mis Archivos</h4>
            </div>
            <div class="action-card">
                <div style="font-size: 2rem; margin-bottom: 0.5rem;">💬</div>
                <h4 style="font-size: 1rem;">Soporte</h4>
            </div>
        </div>

        <!-- Recent Notifications -->
        <h3 class="mb-3" style="font-size: 1.2rem;">Notificaciones</h3>
        <div class="card">
            <div style="border-bottom: 1px solid var(--color-border); padding-bottom: 1rem; margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between;">
                    <strong>Cambio de contraseña exitoso</strong>
                    <span class="text-muted" style="font-size: 0.8rem;">Hace 2 hrs</span>
                </div>
                <p class="text-muted" style="font-size: 0.9rem; margin-top: 0.5rem;">Tu contraseña fue actualizada correctamente.</p>
            </div>
            <div>
                <div style="display: flex; justify-content: space-between;">
                    <strong>Bienvenido al sistema</strong>
                    <span class="text-muted" style="font-size: 0.8rem;">Ayer</span>
                </div>
                <p class="text-muted" style="font-size: 0.9rem; margin-top: 0.5rem;">Gracias por unirte a IT Green. Explora tu dashboard.</p>
            </div>
        </div>
    </div>

    <!-- Sidebar Column -->
    <div style="flex: 1; min-width: 250px;">
        <div class="card">
            <div class="profile-header">
                <div class="profile-avatar">
                    <?= strtoupper(substr(session()->get('email') ?? 'U', 0, 1)) ?>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.25rem;"><?= session()->get('email') ?? 'Usuario' ?></h4>
                    <span class="badge badge-success">Cuenta Activa</span>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="text-muted" style="font-size: 0.85rem;">Email</label>
                <div style="margin-top: 0.25rem;"><?= session()->get('email') ?? 'usuario@ejemplo.com' ?></div>
            </div>

            <div class="mb-4">
                <label class="text-muted" style="font-size: 0.85rem;">Rol</label>
                <div style="margin-top: 0.25rem;">Usuario Estándar</div>
            </div>
            
            <button class="btn btn-outline" style="width: 100%;">Editar Perfil</button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
