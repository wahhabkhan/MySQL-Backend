<?php

namespace backend\controllers;

use common\models\Ax;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
class AxController extends Controller
 {
    public function actionViewAx()
 {
    if ( Yii::$app->user->can( '/ax/view' ) ) {
        // Fetch all Ax
        $models = Ax::find()->all();

        return $this->render( 'view-ax', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }

    }

    public function actionViewAxDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Ax::findOne( $serialNumber );

        return $this->render( 'view-ax-details', [
            'model' => $model,
        ] );
    }

    public function actionAddAx()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['Ax/add-ax']);
        if ( Yii::$app->user->can( '/ax/add' ) ) {
            $model = new Ax();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-ax', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-ax', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/ax/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-ax', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/ax/delete')) {
            // Delete the Ax record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-ax']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Ax::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
