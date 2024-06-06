<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Powerbi $model */

$this->title = 'Update PowerBI: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'Powerbi', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Powerbi-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-powerbi', [
        'model' => $model,
    ]) ?>

</div>