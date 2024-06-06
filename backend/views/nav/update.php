<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Nav $model */

$this->title = 'Update Nav: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'Nav', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Nav-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-nav', [
        'model' => $model,
    ]) ?>

</div>