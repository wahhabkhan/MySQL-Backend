<?php

namespace backend\controllers;

use common\models\C5;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class C5Controller extends Controller
 {
    public function actionViewC5()
 {
    if ( Yii::$app->user->can( '/c5/view' ) ) {
        // Fetch all C5
        $models = C5::find()->all();

        return $this->render( 'view-c5', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewC5Details( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = C5::findOne( $serialNumber );

        return $this->render( 'view-c5-details', [
            'model' => $model,
        ] );
    }

    public function actionAddC5()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['C5/add-c5']);
        if ( Yii::$app->user->can( '/c5/add' ) ) {
            $model = new C5();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-c5', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-c5', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/c5/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-c5', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/c5/delete')) {
            // Delete the C5 record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-c5']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = C5::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
