<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\C5 $model */

$this->title = 'Update C5: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'C5', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="c5-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-c5', [
        'model' => $model,
    ]) ?>

</div>