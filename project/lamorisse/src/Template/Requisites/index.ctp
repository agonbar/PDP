<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisite[]|\Cake\Collection\CollectionInterface $requisites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requisite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Risks'), ['controller' => 'Risks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Risk'), ['controller' => 'Risks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisites index large-9 medium-8 columns content">
    <h3><?= __('Requisites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('risks_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requisites as $requisite): ?>
            <tr>
                <td><?= $this->Number->format($requisite->id) ?></td>
                <td><?= h($requisite->nombre) ?></td>
                <td><?= h($requisite->description) ?></td>
                <td><?= $requisite->has('risk') ? $this->Html->link($requisite->risk->id, ['controller' => 'Risks', 'action' => 'view', $requisite->risk->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requisite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requisite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requisite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisite->id)]) ?>
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
