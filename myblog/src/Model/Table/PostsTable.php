<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->hasMany('Comments', ['dependent'=>true]);   //postが消えたらcommentも消える
  }

  public function validationDefault(Validator $varidator)
  {
    $varidator
      ->notEmpty('title')
      ->requirePresence('title')
      ->notEmpty('body')
      ->requirePresence('body')
      ->add('body', [             //自作バリデーションを追加
        'length'=>[
          'rule'=>['minLength', 10],
          'message'=>'body length most be 10+'
          ]
        ]);
    return $varidator;

  }
}
