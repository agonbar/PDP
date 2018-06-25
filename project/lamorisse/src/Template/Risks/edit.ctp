<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Risk $risk
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $risk->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $risk->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Risks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type'), ['controller' => 'Type', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Type', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="risks form large-9 medium-8 columns content">
    <?= $this->Form->create($risk) ?>
    <fieldset>
        <legend><?= __('Edit Risk') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('description');
            echo $this->Form->control('Criticalidad');
            echo $this->Form->control('industry_id', ['options' => $industry]);
            echo $this->Form->control('type_id', ['options' => $type]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
