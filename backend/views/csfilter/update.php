<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Csfilter $model */

$this->title = 'Update CS Filter: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Csfilter', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Csfilter-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-csfilter', [
        'model' => $model,
    ]) ?>

</div>