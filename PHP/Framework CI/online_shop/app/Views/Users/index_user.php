<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>

<h1 class="mt-4">User</h1>

<table class="table">
    <thead>
        <th>No.</th>
        <th>Username</th>
        <th>Created By</th>
        <th>Created Date</th>
    </thead>
    <tbody>
        <?php foreach ($users as $index => $user) : ?>
            <tr>
                <td><?= $user->id_user ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->created_by ?></td>
                <td><?= $user->created_date ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div style="float: right;">
    <?= $pager->links('default', 'custom_pagination') ?>
</div>
<?= $this->endSection() ?>