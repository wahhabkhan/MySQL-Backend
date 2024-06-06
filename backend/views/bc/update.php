<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Bc $model */

$this->title = 'Update Business Central: ' . $model->serialNumber;
//$this->params['breadcrumbs'][] = ['label' => 'Bc', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Bc-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-bc', [
        'model' => $model,
    ]) ?>

</div>