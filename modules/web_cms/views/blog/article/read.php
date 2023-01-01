<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'Blog Article');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Article'), 'url' => ['/blog']];
?>

<div class="ui vertical stripe segment">
    <div class="blog ui text container">
        <article class="blog content">
            <div class="blog header">
                <div class="blog nav">
                    <div class="ui breadcrumb">
                        <li class="section">
                            <?= Html::a('Blog', '/blog') ?>
                        </li>
                        <li class="section">
                            <?= Html::a($article->category_id, "/blog/{$article->category_id}") ?>
                        </li>
                    </div>
                </div>
                <h1 class="post title"><?= $article->title ?></h1>
                <p class="post intro"><?= $article->intro ?></p>
                <time class="published_date"><?= $article->date_published ?></time>
                <span class="read_time"><?= $article->post_read_time ?></span>
            </div>
            <div class="ui hidden divider"></div>
            <div class="article body">
                <?= Html::tag('div', $article->content) ?>
            </div>
            <div class="ui hidden divider"></div>
            <!-- embed picture credit if any -->
            <div class="blog footer">
                <!-- post-feedback
                    post-likes
                    post-comments
                social-media links (optional)
                    twitter
                    facebook
                    linkedin
                    mail
                published_on -->
            </div>
            <div class="ui hidden divider"></div>
            <!-- author (media?) -->
            <div class="media">
                <!-- avatar -->
                <!-- brief bio -->
            </div>
            <div class="blog comments">
                <div class="comment view">
                    <div class="add comment section">
                        <?= Html::beginForm('', 'post', ['class' => 'ui form']) .
                            Html::textInput('your_name') .
                            Html::textInput('email') .
                            Html::textarea('add_comment') .
                            Html::submitButton('Submit', ['class' => 'ui button']) .
                            Html::endForm() ?>
                    </div>
                    <div class="ui hidden divider"></div>
                    <div class="comment list">
                        <!-- show post_comments timeline -->
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>