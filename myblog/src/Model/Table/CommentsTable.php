<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentssTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->belongsTo('Posts');
  }

  public function validationDefault(Validator $varidator)
  {
    $varidator
      ->notEmpty('body')
      ->requirePresence('body');

    return $varidator;

  }
}
