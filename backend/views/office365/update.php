<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Office365 $model */

$this->title = 'Update Office365: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'Office365', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Office365-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-office365', [
        'model' => $model,
    ]) ?>

</div>