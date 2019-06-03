<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 */
class UsersController extends AppController {

    public $name = 'Users';

    public function beforeFilter() {
        $this->set('title_for_layout', 'Usuários');
    }

    public function index() {

        $this->User->recursive = 0;
        $this->Paginator->settings = array(
            'order' => array('nome' => 'asc',)
        );

        $this->set('users', $this->Paginator->paginate('User'));
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {

        if ($this->request->is('post')) {
            $this->User->create();

            if ($this->User->save($this->request->data)) {

                $id = $this->User->getLastInsertID();

                if ($this->request->data['User']['foto_usuario']['error'] == 0) {
                    $extensao = substr($this->request->data['User']['foto_usuario']['name'], (strlen($this->request->data['User']['foto_usuario']['name']) - 4), strlen($this->request->data['User']['foto_usuario']['name']));
                    $nome_arquivo = "usuario_" . $id . $extensao;
                    $tamanho = @getimagesize($this->request->data['User']['foto_usuario']['tmp_name']);
                    $arquivo = new File($this->request->data['User']['foto_usuario']['tmp_name'], false);
                    $imagem = $arquivo->read();
                    $arquivo->close();
                    $arquivo = new File(WWW_ROOT . 'img/usuarios/' . $nome_arquivo, false, 0777);
                    if ($arquivo->create()) {
                        $arquivo->write($imagem);
                        $arquivo->close();
                    }

                    $this->request->data = $this->User->read(null, $id);

                    $this->request->data['User']['img_foto'] = $nome_arquivo;

                    $this->User->save($this->request->data);
                }
                $this->Session->setFlash('Usuário salvo com sucesso.', 'default', array('class' => 'mensagem_sucesso'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Registro não foi salvo. Por favor tente novamente.', 'default', array('class' => 'mensagem_erro'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Registro inválido.'));
        }

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Registro inválido.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            unlink(WWW_ROOT . 'img/usuarios/' . '/' . $this->request->data['User']['img_foto']);

            if ($this->request->data['User']['foto_usuario']['error'] == 0) {
                $extensao = substr($this->request->data['User']['foto_usuario']['name'], (strlen($this->request->data['User']['foto_usuario']['name']) - 4), strlen($this->request->data['User']['foto_usuario']['name']));
                $nome_arquivo = "usuario_" . $id . $extensao;
                $tamanho = @getimagesize($this->request->data['User']['foto_usuario']['tmp_name']);
                $arquivo = new File($this->request->data['User']['foto_usuario']['tmp_name'], false);
                $imagem = $arquivo->read();
                $arquivo->close();
                $arquivo = new File(WWW_ROOT . 'img/usuarios/' . $nome_arquivo, false, 0777);
                if ($arquivo->create()) {
                    $arquivo->write($imagem);
                    $arquivo->close();
                }

                $this->request->data['User']['img_foto'] = $nome_arquivo;
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Usuário alterado com sucesso.', 'default', array('class' => 'mensagem_sucesso'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Registro não foi alterado. Por favor tente novamente.', 'default', array('class' => 'mensagem_erro'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }

    public function delete($id = null) {

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('Usuário deletado com sucesso.', 'default', array('class' => 'mensagem_sucesso'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Registro não foi deletado.', 'default', array('class' => 'mensagem_erro'));
        $this->redirect(array('action' => 'index'));
    }

}
