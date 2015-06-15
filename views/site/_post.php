<div class="col-lg-4">
    <h2><?= $model->title?></h2>

    <p><?= substr($model->text, 0, 275)?>...</p>

    <span class="pull-right created-at">Created at <?= $model->created_at?></span>

    <p><a class="btn btn-default" href="<?= \yii\helpers\Url::to(['/post/view', 'id' => $model->id])?>">Read</a></p>
</div>