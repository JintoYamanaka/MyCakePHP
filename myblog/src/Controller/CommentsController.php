<?php

//  /posts/index
//  /posts
//  /(controller)/(action)/(options)

namespace App\Controller;

class CommentsController extends AppController
{
  public function add()
  {
    $comment = $this->Comments->newEntity();
    $this->set(compact('comment'));
    if($this->request->is('post')) {  //リクエストがPOSTのとき
      $comment = $this->Comments->patchEntity($comment, $this->request->data); //$commentの中に受け取ったデータを代入
      if($this->Comments->save($comment)) {        //ここでバリデーションが入る
        $this->Flash->success('Comment Add Success!');
        return $this->redirect(['controller'=> 'Posts', 'action'=>'view', $comment->post_id]);
      } else {
        //error
        $this->Flash->error('Comment Add Error!');
        return $this->redirect(['controller'=> 'Posts', 'action'=>'view']);
      }
    }
  }

  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $comment = $this->Comments->get($id);
    if ($this->Comments->delete($comment)) {
      $this->Flash->success('Comment Delete Success!');
    } else {
      $this->Flash->error('Comment Delete Error!');
    }
    return $this->redirect(['controller'=>'Posts', 'action'=>'view', $comment->post_id]);
  }
}
