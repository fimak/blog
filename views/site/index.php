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
            <div class="col-md-2 col-md-offset-5" style="text-align: center;">
                <div class="row">
                    <label for="categoryList">Category</label>
                </div>
                <div class="row">
                    <?= \yii\helpers\Html::dropDownList('categoryList', $categoryId, \app\models\Category::getList(), ['class' => 'form-control'])?>
                </div>
            </div>
        </div>
        <div class="row posts">
            <?= $this->render('_posts', [
                'dataProvider' => $dataProvider
            ])?>
        </div>
    </div>
</div>
