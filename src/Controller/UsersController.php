<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function index()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role !== 'administrador') {
            $this->Flash->error('No tienes permisos para acceder a esta sección.');
            return $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
        }
        $users = $this->paginate($this->Users->find());
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role !== 'administrador') {
            $this->Flash->error('No tienes permisos para acceder a esta sección.');
            return $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
        }
        $usuario = $this->Users->get($id, contain: ['Reactivos']);
        $this->set(compact('usuario'));
    }

    public function add()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role !== 'administrador') {
            $this->Flash->error('No tienes permisos para acceder a esta sección.');
            return $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
        }
        $usuario = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Users->patchEntity($usuario, $this->request->getData());
            if ($this->Users->save($usuario)) {
                $this->Flash->success('El usuario ha sido guardado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El usuario no pudo ser guardado. Por favor, intenta nuevamente.');
        }
        $this->set(compact('usuario'));
    }

    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role !== 'administrador') {
            $this->Flash->error('No tienes permisos para acceder a esta sección.');
            return $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
        }
        $usuario = $this->Users->get($id);
        if ($this->request->is(['patch','post','put'])) {
            $usuario = $this->Users->patchEntity($usuario, $this->request->getData());
            if ($this->Users->save($usuario)) {
                $this->Flash->success('El usuario ha sido guardado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El usuario no pudo ser guardado. Por favor, intenta nuevamente.');
        }
        $this->set(compact('usuario'));
    }

    public function delete($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role !== 'administrador') {
            $this->Flash->error('No tienes permisos para acceder a esta sección.');
            return $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
        }
        $this->request->allowMethod(['post','delete']);
        $usuario = $this->Users->get($id);
        if ($this->Users->delete($usuario)) {
            $this->Flash->success('El usuario ha sido eliminado.');
        } else {
            $this->Flash->error('El usuario no pudo ser eliminado. Por favor, intenta nuevamente.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->request->allowMethod(['get','post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
        }
        if ($this->request->is('post') && (!$result || !$result->isValid())) {
            $this->Flash->error('Email o contraseña inválidos');
        }
    }

    public function logout()
    {
        $this->request->allowMethod(['get','post']);
        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']);
    }
}
