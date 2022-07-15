<div class="ui centered card">
    <div class="image">
        <img src="<?= Yii::getAlias('@web/uploads/') . $teamMember['photoImage'] ?>">
    </div>
    <div class="content">
        <a class="header"><?= $teamMember['fullName'] ?></a>
        <!-- <div class="meta">
            <span class="date"><?= Yii::t('app', 'Joined in') ?> </span>
        </div> -->
        <div class="description">
            <?= $teamMember['designation'] ?>
        </div>
    </div>
    <div class="extra content">
        <?= $teamMember['bio'] ?>
        <a>
            <i class="user icon"></i>
            22 Friends
        </a>
    </div>
</div>