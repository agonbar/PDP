<h1>Companies</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
    </tr>

  
    <?php foreach ($companys as $company): ?>
    <tr>
        <td><?= $company->id ?></td>
        <td>
            <?= $this->Html->link($company->name,
            ['controller' => 'Companys', 'action' => 'view', $company->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>