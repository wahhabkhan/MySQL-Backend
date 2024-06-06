<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Rms $model */

$this->title = 'Update RMS: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'Rms', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Rms-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-rms', [
        'model' => $model,
    ]) ?>

</div>