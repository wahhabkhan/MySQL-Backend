<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Clientlogos $model */

$this->title = 'Update Client Logo: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Clientlogos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Clientlogos-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-clientlogos', [
        'model' => $model,
    ]) ?>

</div>