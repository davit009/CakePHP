<?php
/** @var \Authentication\Identity $user */
?>
<div class="dashboard">
<?php if ($user->role === 'administrador'): ?>
  <h2>Dashboard Administrador</h2>
  <div class="row">
    <div class="column">
      <div class="dashboard-card">
        <h3>Totales</h3>
        <p><strong>Usuarios:</strong> <?= (int)$totalUsers ?></p>
        <p><strong>Reactivos:</strong> <?= (int)$totalReactivos ?></p>
      </div>
    </div>
    <div class="column">
      <div class="dashboard-card">
        <h3>Reactivos por Especialidad</h3>
        <ul>
          <?php foreach ($reactivosPorEspecialidad as $r): ?>
            <li><?= h($r->area_especialidad) ?>: <?= (int)$r->count ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="user-dashboard">
    <h2>Panel de Usuario</h2>
    <div class="row">
      <div class="column">
        <div class="dashboard-card">
          <h3>Mis Estadísticas</h3>
          <p><strong>Reactivos Creados:</strong> <?= (int)$misReactivos ?></p>
        </div>
      </div>
      <div class="column">
        <div class="dashboard-card">
          <h3>Acciones Disponibles</h3>
          <?= $this->Html->link('Ver Mis Reactivos', ['controller'=>'Reactivos','action'=>'index'], ['class'=>'button']) ?>
          <br><br>
          <?= $this->Html->link('Crear Nuevo Reactivo', ['controller'=>'Reactivos','action'=>'add'], ['class'=>'button button-outline']) ?>
        </div>
      </div>
    </div>
    <div class="dashboard-card">
      <h3>Información del Sistema</h3>
      <p>Bienvenido al sistema de generación de exámenes médicos. Como usuario base, puedes:</p>
      <ul>
        <li>Crear reactivos</li>
        <li>Editar y eliminar tus propios reactivos</li>
        <li>Ver estadísticas de tu trabajo</li>
      </ul>
    </div>
  </div>
<?php endif; ?>
</div>

<style>
.dashboard{padding:1rem 0}
.row{display:flex;flex-wrap:wrap;margin:-.5rem}
.column{flex:1;padding:.5rem;min-width:300px}
</style>
