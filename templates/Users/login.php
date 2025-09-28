

<div class="users form">
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css') ?>
<style>
.login-container{max-width:400px;margin:5rem auto;padding:2rem;border:1px solid #d1d1d1;border-radius:10px;background:#fff;box-shadow:0 0 10px rgba(0,0,0,.1)}
.login-header{text-align:center;margin-bottom:2rem;color:#2c3e50}
.btn-login{width:100%;background:#3498db;border-color:#3498db}
.btn-login:hover{background:#2980b9;border-color:#2980b9}
.test-credentials{background:#f8f9fa;border:1px solid #dee2e6;border-radius:5px;padding:1rem;margin-top:1.5rem;font-size:.9rem}
body{background:#ecf0f1}
</style>

<div class="login-container">
  <div class="login-header">
    <h2>Sistema de Exámenes Médicos</h2>
    <h4>Iniciar Sesión</h4>
  </div>

  <?= $this->Form->create(null, ['class'=>'login-form']) ?>
    <?= $this->Form->control('email', [
      'type'=>'email','label'=>'Correo Electrónico','placeholder'=>'Ingresa tu email','required'=>true
    ]) ?>
    <?= $this->Form->control('password', [
      'type'=>'password','label'=>'Contraseña','placeholder'=>'Ingresa tu contraseña','required'=>true
    ]) ?>
    <?= $this->Form->button('Iniciar Sesión', ['type'=>'submit','class'=>'button button-outline btn-login']) ?>
  <?= $this->Form->end() ?>

  <div class="test-credentials">
    <strong>Credenciales de prueba:</strong><br>
    <strong>Administrador:</strong><br>
    Email: admin@example.com<br>
    Contraseña: password123
  </div>
</div>
</div>
