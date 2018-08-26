<?php $this->assign('title', 'Create Users'); ?>

<?= $this->Html->link("home", ['action'=>'index']); ?>

<?= $this->Form->create($user); ?>
<?= $this->Form->input('username'); ?>
<?= $this->Form->input('email'); ?>
<?= $this->Form->input('password'); ?>
<?= $this->Form->input('college'); ?>
<?= $this->Form->button('登録'); ?>
<?= $this->Form->end(); ?>

<!-- <?= var_dump($_POST['name']); ?><br>
<?= var_dump("$user"); ?><br>
<?= var_dump($data); ?><br>
<?= var_dump($new); ?><br> -->
