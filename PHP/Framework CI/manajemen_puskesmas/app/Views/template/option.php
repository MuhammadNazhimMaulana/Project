<div class="form-group">
    <select class="form-select" onchange="this.form.submit()" name="id" id="id">
        <option value="1">Cari</option>
        <?php foreach ($user as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['firstname'] ?></option>
        <?php endforeach; ?>
    </select>
</div>