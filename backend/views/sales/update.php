<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Sales $model */

$this->title = 'Update Sales: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'sales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Sales-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-sales', [
        'model' => $model,
    ]) ?>

</div>