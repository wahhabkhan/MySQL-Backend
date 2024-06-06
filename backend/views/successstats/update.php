<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Successstats $model */

$this->title = 'Update Success Stat: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Successstats', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Successstats-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-successstats', [
        'model' => $model,
    ]) ?>

</div>