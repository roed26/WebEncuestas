<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Question Controller
 *
 * @property \App\Model\Table\QuestionTable $Question
 */
class QuestionController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Poll']
        ];
        $this->set('question', $this->paginate($this->Question));
        $this->set('_serialize', ['question']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Question->get($id, [
            'contain' => ['Poll', 'Answer', 'AnswerText']
        ]);
        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Question->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Question->patchEntity($question, $this->request->data);
            if ($this->Question->save($question)) {
                $this->Flash->success('The question has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The question could not be saved. Please, try again.');
            }
        }
        $poll = $this->Question->Poll->find('list', ['limit' => 200]);
        $this->set(compact('question', 'poll'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Question->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Question->patchEntity($question, $this->request->data);
            if ($this->Question->save($question)) {
                $this->Flash->success('The question has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The question could not be saved. Please, try again.');
            }
        }
        $poll = $this->Question->Poll->find('list', ['limit' => 200]);
        $this->set(compact('question', 'poll'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Question->get($id);
        if ($this->Question->delete($question)) {
            $this->Flash->success('The question has been deleted.');
        } else {
            $this->Flash->error('The question could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
