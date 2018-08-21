<?php $this->assign('title', 'edit User'); ?>

<?= $this->Form->create($user); ?>
<?= $this->Form->input('name'); ?>
<?= $this->Form->input('email'); ?>
<?= $this->Form->input('password'); ?>
<?= $this->Form->input('college'); ?>
<?= $this->Form->button('変更'); ?>
<?= $this->Form->end(); ?>
