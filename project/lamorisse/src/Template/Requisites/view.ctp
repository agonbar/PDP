<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisite $requisite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requisite'), ['action' => 'edit', $requisite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requisite'), ['action' => 'delete', $requisite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requisites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requisite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Risks'), ['controller' => 'Risks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risk'), ['controller' => 'Risks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requisites view large-9 medium-8 columns content">
    <h3><?= h($requisite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($requisite->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($requisite->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risk') ?></th>
            <td><?= $requisite->has('risk') ? $this->Html->link($requisite->risk->id, ['controller' => 'Risks', 'action' => 'view', $requisite->risk->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requisite->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Companys') ?></h4>
        <?php if (!empty($requisite->companys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cif') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requisite->companys as $companys): ?>
            <tr>
                <td><?= h($companys->id) ?></td>
                <td><?= h($companys->cif) ?></td>
                <td><?= h($companys->nombre) ?></td>
                <td><?= h($companys->description) ?></td>
                <td><?= h($companys->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Companys', 'action' => 'view', $companys->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Companys', 'action' => 'edit', $companys->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companys', 'action' => 'delete', $companys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companys->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
