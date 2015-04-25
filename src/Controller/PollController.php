<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Poll Controller
 *
 * @property \App\Model\Table\PollTable $Poll
 */
class PollController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('poll', $this->paginate($this->Poll));
        $this->set('_serialize', ['poll']);
    }

    /**
     * View method
     *
     * @param string|null $id Poll id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poll = $this->Poll->get($id, [
            'contain' => ['Users', 'Question']
        ]);
        $this->set('poll', $poll);
        $this->set('_serialize', ['poll']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poll = $this->Poll->newEntity();
        if ($this->request->is('post')) {
            $poll = $this->Poll->patchEntity($poll, $this->request->data);
            if ($this->Poll->save($poll)) {
                $this->Flash->success('The poll has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The poll could not be saved. Please, try again.');
            }
        }
        $users = $this->Poll->Users->find('list', ['limit' => 200]);
        $this->set(compact('poll', 'users'));
        $this->set('_serialize', ['poll']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Poll id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poll = $this->Poll->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poll = $this->Poll->patchEntity($poll, $this->request->data);
            if ($this->Poll->save($poll)) {
                $this->Flash->success('The poll has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The poll could not be saved. Please, try again.');
            }
        }
        $users = $this->Poll->Users->find('list', ['limit' => 200]);
        $this->set(compact('poll', 'users'));
        $this->set('_serialize', ['poll']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Poll id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $poll = $this->Poll->get($id);
        if ($this->Poll->delete($poll)) {
            $this->Flash->success('The poll has been deleted.');
        } else {
            $this->Flash->error('The poll could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
