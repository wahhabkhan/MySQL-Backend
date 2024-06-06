<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pdfresources $model */

$this->title = 'Update Pdf Resource: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Pdfresources', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Pdfresources-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-pdfresources', [
        'model' => $model,
    ]) ?>

</div>