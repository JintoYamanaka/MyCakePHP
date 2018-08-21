<?php
  $this->assign('title', 'Blog Posts');
?>
<h1>
  <?= $this->Html->link('Add New', ['action'=>'add'], ['class'=>['pull-right', 'fs12']]); ?>
  Blog Posts
</h1>
<!-- <?php var_dump($this); ?> -->
<ul>
  <?php foreach ($posts as $post): ?>
    <li>
      <?= $this->Html->link($post->title, ['action'=>'view', $post->id]); ?>
      <?= $this->Html->link('[Edit]', ['action'=>'edit', $post->id],
      ['class'=>'fs12']); ?>
      <!-- <a href="<?= $this->Url->build(['action'=>'view', $post->id]); ?>">
        <?= h($post->title); ?>
      </a> -->
      <?=
        $this->Form->postlink(
          '[x]',
          ['action'=>'delete', $post->id],
          ['confirm'=>'Are you sure?', 'class'=>'fs12']
        );
      ?>
    </li>
  <?php endforeach; ?>
</ul>
