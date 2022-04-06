<p>Hi <?= $content['salutation'] ?>,</p>
<br>
<p><?= $content['preamble'] ?></p>
<?= isset($content['start_date']) ? '<p>' . $content['start_date'] . '</p>' : null ?>
<?= isset($content['end_date']) ? '<p>' . $content['end_date'] . '</p>' : null ?>
<p><?= $content['status'] ?></p>
<br>
<p><a href="<?= $content['web_link'] ?>"><b> View </b></a></p>