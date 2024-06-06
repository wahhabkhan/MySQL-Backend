<?php

namespace backend\controllers;

use common\models\Powerbi;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class PowerbiController extends Controller
 {
    public function actionViewPowerbi()
 {
    if ( Yii::$app->user->can( '/powerbi/view' ) ) {   
    // Fetch all Powerbi
        $models = Powerbi::find()->all();

        return $this->render( 'view-powerbi', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewPowerbiDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Powerbi::findOne( $serialNumber );

        return $this->render( 'view-powerbi-details', [
            'model' => $model,
        ] );
    }

    public function actionAddPowerbi()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['powerbi/add-powerbi']);
        if ( Yii::$app->user->can( '/powerbi/add' ) ) {
            $model = new Powerbi();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-powerbi', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-powerbi', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/powerbi/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-powerbi', 'serialNumber' => $model->serialNumber ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($serialNumber)
    {
        if (Yii::$app->user->can('/powerbi/delete')) {
            // Delete the Powerbi record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-powerbi']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Powerbi::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
