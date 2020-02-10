<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Swimmer Controller
 *
 * @property \App\Model\Table\SwimmerTable $Swimmer
 *
 * @method \App\Model\Entity\Swimmer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SwimmerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events'],
        ];
        $swimmer = $this->paginate($this->Swimmer);

        $this->set(compact('swimmer'));
    }

    /**
     * View method
     *
     * @param string|null $id Swimmer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $swimmer = $this->Swimmer->get($id, [
            'contain' => ['Events'],
        ]);

        $this->set('swimmer', $swimmer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $swimmer = $this->Swimmer->newEntity();
        if ($this->request->is('post')) {
            $swimmer = $this->Swimmer->patchEntity($swimmer, $this->request->getData());
            if ($this->Swimmer->save($swimmer)) {
                $this->Flash->success(__('The swimmer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The swimmer could not be saved. Please, try again.'));
        }
        $events = $this->Swimmer->Events->find('list', ['limit' => 200]);
        $this->set(compact('swimmer', 'events'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Swimmer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $swimmer = $this->Swimmer->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $swimmer = $this->Swimmer->patchEntity($swimmer, $this->request->getData());
            if ($this->Swimmer->save($swimmer)) {
                $this->Flash->success(__('The swimmer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The swimmer could not be saved. Please, try again.'));
        }
        $events = $this->Swimmer->Events->find('list', ['limit' => 200]);
        $this->set(compact('swimmer', 'events'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Swimmer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $swimmer = $this->Swimmer->get($id);
        if ($this->Swimmer->delete($swimmer)) {
            $this->Flash->success(__('The swimmer has been deleted.'));
        } else {
            $this->Flash->error(__('The swimmer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'events','action' => 'view',$swimmer['event_id']]);
    }
}
