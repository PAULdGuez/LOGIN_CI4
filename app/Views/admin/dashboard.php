<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Dashboard Admin
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="header">
    <div>
        <h2 class="mb-1">Dashboard Admin</h2>
        <p class="text-muted">Resumen de actividad y gestión del sistema.</p>
    </div>
    <div class="date-badge">
        <span class="badge badge-success"><?= date('d M Y') ?></span>
    </div>
</div>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    <!-- Stat Card 1 -->
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h4 class="text-muted mb-2" style="font-size: 0.85rem; text-transform: uppercase;">Usuarios Registrados</h4>
                <div style="font-size: 2.5rem; font-weight: 700; color: var(--color-primary);">1,284</div>
            </div>
            <div style="background: rgba(140, 198, 63, 0.1); padding: 10px; border-radius: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-primary);"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
        </div>
        <div style="color: #bef264; font-size: 0.85rem; margin-top: 1rem;">
            ↑ 12% vs mes anterior
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h4 class="text-muted mb-2" style="font-size: 0.85rem; text-transform: uppercase;">Ingresos Totales</h4>
                <div style="font-size: 2.5rem; font-weight: 700; color: white;">$45,231</div>
            </div>
            <div style="background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: white;"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
        </div>
        <div style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 1rem;">
            Actualizado hoy
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h4 class="text-muted mb-2" style="font-size: 0.85rem; text-transform: uppercase;">Incidencias</h4>
                <div style="font-size: 2.5rem; font-weight: 700; color: #fca5a5;">3</div>
            </div>
            <div style="background: rgba(239, 68, 68, 0.1); padding: 10px; border-radius: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #fca5a5;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            </div>
        </div>
        <div style="color: #fca5a5; font-size: 0.85rem; margin-top: 1rem;">
            Requieren atención
        </div>
    </div>
</div>

<!-- Recent Activity Table -->
<div class="card">
    <div class="mb-4" style="display: flex; justify-content: space-between; align-items: center;">
        <h3 style="font-size: 1.25rem;">Últimos Registros</h3>
        <button class="btn btn-outline" style="font-size: 0.9rem; padding: 0.5rem 1rem;">Ver Todo</button>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 32px; height: 32px; background: var(--color-secondary); border-radius: 50%;"></div>
                            <span>Juan Pérez</span>
                        </div>
                    </td>
                    <td><span class="badge badge-success">Activo</span></td>
                    <td>23 Ene 2026</td>
                    <td><a href="#" style="font-size: 0.9rem;">Editar</a></td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 32px; height: 32px; background: #64748b; border-radius: 50%;"></div>
                            <span>Ana López</span>
                        </div>
                    </td>
                    <td><span class="badge badge-warning">Pendiente</span></td>
                    <td>22 Ene 2026</td>
                    <td><a href="#" style="font-size: 0.9rem;">Revisar</a></td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 32px; height: 32px; background: var(--color-secondary); border-radius: 50%;"></div>
                            <span>Carlos Ruiz</span>
                        </div>
                    </td>
                    <td><span class="badge badge-success">Activo</span></td>
                    <td>21 Ene 2026</td>
                    <td><a href="#" style="font-size: 0.9rem;">Editar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
