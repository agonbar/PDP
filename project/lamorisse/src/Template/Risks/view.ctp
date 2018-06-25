<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Risk $risk
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Risk'), ['action' => 'edit', $risk->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Risk'), ['action' => 'delete', $risk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $risk->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Risks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risk'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type'), ['controller' => 'Type', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Type', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="risks view large-9 medium-8 columns content">
    <h3><?= h($risk->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($risk->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($risk->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Industry') ?></th>
            <td><?= $risk->has('industry') ? $this->Html->link($risk->industry->id, ['controller' => 'Industry', 'action' => 'view', $risk->industry->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $risk->has('type') ? $this->Html->link($risk->type->id, ['controller' => 'Type', 'action' => 'view', $risk->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($risk->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criticalidad') ?></th>
            <td><?= $risk->Criticalidad ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
