<?php

//  /posts/index
//  /posts
//  /(controller)/(action)/(options)

namespace App\Controller;

class PostsController extends AppController
{
  public function index()
  {
    $posts = $this->Posts->find('all');
    // $posts = $this->Posts->find('all')
    //                      ->order(['title' => 'DESC'])  //降順で
    //                      ->limit(2)                     //２つ目まで
    //                      ->where(['title like' => '%3']);   //最後が３で終わるもの

    // $this->set('posts', $posts);
    $this->set(compact('posts'));
  }

  public function view($id = null)
  {
    // $post = $this->Posts->get($id);  //データを１つ持ってくる
    $post = $this->Posts->get($id, ['contain' => 'Comments']);  
    $this->set(compact('post'));
  }

  public function add()
  {
    $post = $this->Posts->newEntity();
    $this->set(compact('post'));
    if($this->request->is('post')) {  //リクエストがPOSTのとき
      $post = $this->Posts->patchEntity($post, $this->request->data); //$postの中に受け取ったデータを代入
      if($this->Posts->save($post)) {        //ここでバリデーションが入る
        $this->Flash->success('Add Success!');
        return $this->redirect(['action'=>'index']);
      } else {
        //error
        $this->Flash->error('Add Error!');

      }
    }
  }

  public function edit($id = null)
  {
    $post = $this->Posts->get($id);
    $this->set(compact('post'));

    if($this->request->is(['post', 'patch', 'put'])) {  //リクエストがPOSTのとき
      $post = $this->Posts->patchEntity($post, $this->request->data); //$postの中に受け取ったデータを代入
      if($this->Posts->save($post)) {        //ここでバリデーションが入る
        $this->Flash->success('Edit Success!');
        return $this->redirect(['action'=>'index']);
      } else {
        //error
        $this->Flash->error('Edit Error!');

      }
    }
  }

  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $post = $this->Posts->get($id);
    if ($this->Posts->delete($post)) {
      $this->Flash->success('Delete Success!');
    } else {
      $this->Flash->error('Delete Error!');
    }
    return $this->redirect(['action'=>'index']);
  }
}
