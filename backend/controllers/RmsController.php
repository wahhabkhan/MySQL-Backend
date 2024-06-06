<?php

namespace backend\controllers;

use common\models\Rms;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class RmsController extends Controller
 {
    public function actionViewRms()
 {
    if ( Yii::$app->user->can( '/rms/view' ) ) {
        // Fetch all Rms
        $models = Rms::find()->all();

        return $this->render( 'view-rms', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewRmsDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Rms::findOne( $serialNumber );

        return $this->render( 'view-rms-details', [
            'model' => $model,
        ] );
    }

    public function actionAddRms()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['Rms/add-rms']);
        if ( Yii::$app->user->can( '/rms/add' ) ) {
            $model = new Rms();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-rms', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-rms', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/rms/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-rms', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/rms/delete')) {
            // Delete the Rms record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-rms']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Rms::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
