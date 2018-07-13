<?php
  $this->assign('title', 'Edit Posts');
?>
<h1>
  <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
  Edit Post
</h1>

<?= $this->Form->create($post); ?> <!--入力フォーム-->
<?= $this->Form->input('title'); ?>
<?= $this->Form->input('body', ['rows'=>'3']); ?>
<?= $this->Form->button('Update'); ?>
<?= $this->Form->end(); ?>
