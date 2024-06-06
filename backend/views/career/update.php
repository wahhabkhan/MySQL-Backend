<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Career $model */

$this->title = 'Update Career: ' . $model->jobId;
//$this->params['breadcrumbs'][] = ['label' => 'Career', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Career-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-career', [
        'model' => $model,
    ]) ?>

</div>