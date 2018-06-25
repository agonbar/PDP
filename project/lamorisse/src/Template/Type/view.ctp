<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Type'), ['action' => 'edit', $type->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Type'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Risks'), ['controller' => 'Risks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risk'), ['controller' => 'Risks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="type view large-9 medium-8 columns content">
    <h3><?= h($type->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($type->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($type->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Risks') ?></h4>
        <?php if (!empty($type->risks)): ?>
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
            <?php foreach ($type->risks as $risks): ?>
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
