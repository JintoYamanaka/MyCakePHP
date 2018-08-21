<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function index()
    {
        // $users = $this->paginate($this->Users);
        $users = $this->Users->find('all');
        // $this->set('users', $users);
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        // $user = $this->Users->get($id, [
        //     'contain' => []
        // ]);

        $user = $this->Users->get($id);  //get １個持ってくる

        $this->set('user', $user);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $new = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $data = $this->request->getData();
            if ($this->Users->save($user)) {
                // $this->Flash->success(__('The user has been saved.'));
                if($user->name != NULL) $this->Flash->success('The user has been saved.');
                if($user->name == NULL) $this->Flash->success('name null');

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set(compact('data'));
        $this->set(compact('new'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
