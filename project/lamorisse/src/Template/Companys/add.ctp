<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requisites'), ['controller' => 'Requisites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requisite'), ['controller' => 'Requisites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companys form large-9 medium-8 columns content">
    <?= $this->Form->create($company) ?>
    <fieldset>
        <legend><?= __('Add Company') ?></legend>
        <?php
            echo $this->Form->control('cif');
            echo $this->Form->control('nombre');
            echo $this->Form->control('description');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('requisites._ids', ['options' => $requisites]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
