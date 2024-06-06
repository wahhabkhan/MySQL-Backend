<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CRM $model */

$this->title = 'Update CRM: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'CRM', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="crm-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-crm', [
        'model' => $model,
    ]) ?>

</div>