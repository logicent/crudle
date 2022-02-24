<div class="ui divider"></div>

<div class="ui basic padded segment">
    <div class="ui header">
        <?= Yii::t('app', 'Import Log') ?>
    </div>
    <p class="text-muted">Some errors were encountered during the data import. Fix and re-upload the data template.</p>

    <table class="ui very basic table">
        <tr>
            <th>Row</th>
            <th>Validation Error(s)</th>
        </tr>
    <?php foreach ($import_errors as $row => $error) : ?>
        <tr>
            <td><?= $row ?></td>
            <td><b><?= $error ?></b></td>
        </tr>
    <?php endforeach ?>
    </table>
</div>