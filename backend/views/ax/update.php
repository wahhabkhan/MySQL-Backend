<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AX $model */

$this->title = 'Update AX: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'AX', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Ax-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-ax', [
        'model' => $model,
    ]) ?>

</div>