<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Casestudytags $model */

$this->title = 'Update Case Study Tag: ' . $model->case_study_name;
//$this->params['breadcrumbs'][] = ['label' => 'casestudytags', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="casestudytags-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-casestudytags', [
        'model' => $model,
    ]) ?>

</div>