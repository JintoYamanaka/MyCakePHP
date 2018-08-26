<?php $this->assign('title', 'All Users'); ?>

<h1>Users</h1>

<div><?= $this->Html->link("新規作成", ['action'=>'add']); ?></div>
<div><?= $this->Html->link("ログイン", ['action'=>'login']); ?></div>
<div><?= $this->Html->link("ログアウト", ['action'=>'logout']); ?></div>


<ul>
  <?php foreach ($users as $user) : ?>
    <li><?= $this->Html->link($user->username, ['action'=>'view', $user->id]); ?></li>
    <?=
        $this->Form->postLink(
            '削除',  //リンクテキスト
            ['action'=>'delete', $user->id],
            ['confirm'=>'Are you sure?']
        )
     ?>
  <?php endforeach; ?>
</ul>
