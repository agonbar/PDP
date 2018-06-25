<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Risk[]|\Cake\Collection\CollectionInterface $risks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Risk'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type'), ['controller' => 'Type', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Type', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="risks index large-9 medium-8 columns content">
    <h3><?= __('Risks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criticalidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('industry_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($risks as $risk): ?>
            <tr>
                <td><?= $this->Number->format($risk->id) ?></td>
                <td><?= h($risk->nombre) ?></td>
                <td><?= h($risk->description) ?></td>
                <td><?= h($risk->Criticalidad) ?></td>
                <td><?= $risk->has('industry') ? $this->Html->link($risk->industry->id, ['controller' => 'Industry', 'action' => 'view', $risk->industry->id]) : '' ?></td>
                <td><?= $risk->has('type') ? $this->Html->link($risk->type->id, ['controller' => 'Type', 'action' => 'view', $risk->type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $risk->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $risk->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $risk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $risk->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
