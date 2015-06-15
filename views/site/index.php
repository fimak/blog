<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hello<?= \Yii::$app->user->isGuest ? '' : ' '.\Yii::$app->user->identity->fullName  ?>!</h1>

        <p class="lead">You can create your post here.</p>

        <p><a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['post/create'])?>">Create a Post</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_post',
            ]);?>
        </div>

    </div>
</div>
