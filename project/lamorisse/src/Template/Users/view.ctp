<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($user->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enabled') ?></th>
            <td><?= $this->Number->format($user->enabled) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asesor') ?></th>
            <td><?= $this->Number->format($user->asesor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CreatedAt') ?></th>
            <td><?= h($user->createdAt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UpdatedAt') ?></th>
            <td><?= h($user->updatedAt) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Companys') ?></h4>
        <?php if (!empty($user->companys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cif') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->companys as $companys): ?>
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
    <div class="related">
        <h4><?= __('Related Industry') ?></h4>
        <?php if (!empty($user->industry)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->industry as $industry): ?>
            <tr>
                <td><?= h($industry->id) ?></td>
                <td><?= h($industry->nombre) ?></td>
                <td><?= h($industry->description) ?></td>
                <td><?= h($industry->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Industry', 'action' => 'view', $industry->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Industry', 'action' => 'edit', $industry->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Industry', 'action' => 'delete', $industry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
