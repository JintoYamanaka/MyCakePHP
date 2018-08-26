<?php $this->assign('title', $user->id); ?>

<ul>
    <li><?= h($user->id); ?></li>
    <li><?= h($user->username); ?></li>
    <li><?= h($user->email); ?></li>
    <li><?= h($user->college); ?></li>
    <li><?= h($user->password); ?></li>
</ul>

<?= $this->Html->link('編集', ['action'=>'edit', $user->id]);?>
