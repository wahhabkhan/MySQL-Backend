<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Casestudiescards $model */

$this->title = 'Update Case Study Card: ' . $model->case_study_name;
//$this->params['breadcrumbs'][] = ['label' => 'casestudycard', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="casestudycard-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-casestudiescards', [
        'model' => $model,
    ]) ?>

</div>