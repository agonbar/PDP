<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requisites'), ['controller' => 'Requisites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requisite'), ['controller' => 'Requisites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companys view large-9 medium-8 columns content">
    <h3><?= h($company->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($company->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($company->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $company->has('user') ? $this->Html->link($company->user->id, ['controller' => 'Users', 'action' => 'view', $company->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cif') ?></th>
            <td><?= $this->Number->format($company->cif) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requisites') ?></h4>
        <?php if (!empty($company->requisites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Risks Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->requisites as $requisites): ?>
            <tr>
                <td><?= h($requisites->id) ?></td>
                <td><?= h($requisites->nombre) ?></td>
                <td><?= h($requisites->description) ?></td>
                <td><?= h($requisites->risks_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requisites', 'action' => 'view', $requisites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requisites', 'action' => 'edit', $requisites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requisites', 'action' => 'delete', $requisites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
