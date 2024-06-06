<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Fieldservice $model */

$this->title = 'Update Field Service: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'Field Service', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fieldservice-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-fieldservice', [
        'model' => $model,
    ]) ?>

</div>