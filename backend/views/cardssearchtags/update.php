<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cardsearchtags $model */

$this->title = 'Update Cards Search Tag: ' . $model->tag_name;
//$this->params['breadcrumbs'][] = ['label' => 'Cardsearchtags', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Cardsearchtags-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-cardssearchtags', [
        'model' => $model,
    ]) ?>

</div>