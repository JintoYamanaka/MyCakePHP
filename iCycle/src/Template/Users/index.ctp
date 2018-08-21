<?php $this->assign('title', 'All Users'); ?>

<h1>Users</h1>

<?= $this->Html->link("新規作成", ['action'=>'add']); ?>

<ul>
  <?php foreach ($users as $user) : ?>
    <li><?= $this->Html->link($user->name, ['action'=>'view', $user->id]); ?></li>
    <?=
        $this->Form->postLink(
            '削除',  //リンクテキスト
            ['action'=>'delete', $user->id],
            ['confirm'=>'Are you sure?']
        )
     ?>
  <?php endforeach; ?>
</ul>
