<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisite $requisite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requisite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requisite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requisites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Risks'), ['controller' => 'Risks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Risk'), ['controller' => 'Risks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisites form large-9 medium-8 columns content">
    <?= $this->Form->create($requisite) ?>
    <fieldset>
        <legend><?= __('Edit Requisite') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('description');
            echo $this->Form->control('risks_id', ['options' => $risks]);
            echo $this->Form->control('companys._ids', ['options' => $companys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
