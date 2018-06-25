<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Industry $industry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Industry'), ['action' => 'edit', $industry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Industry'), ['action' => 'delete', $industry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Industry'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Industry'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Risks'), ['controller' => 'Risks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risk'), ['controller' => 'Risks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="industry view large-9 medium-8 columns content">
    <h3><?= h($industry->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($industry->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($industry->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $industry->has('user') ? $this->Html->link($industry->user->id, ['controller' => 'Users', 'action' => 'view', $industry->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($industry->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Risks') ?></h4>
        <?php if (!empty($industry->risks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Criticalidad') ?></th>
                <th scope="col"><?= __('Industry Id') ?></th>
                <th scope="col"><?= __('Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($industry->risks as $risks): ?>
            <tr>
                <td><?= h($risks->id) ?></td>
                <td><?= h($risks->nombre) ?></td>
                <td><?= h($risks->description) ?></td>
                <td><?= h($risks->Criticalidad) ?></td>
                <td><?= h($risks->industry_id) ?></td>
                <td><?= h($risks->type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Risks', 'action' => 'view', $risks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Risks', 'action' => 'edit', $risks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Risks', 'action' => 'delete', $risks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $risks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
