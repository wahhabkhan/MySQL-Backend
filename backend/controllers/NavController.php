<?php

namespace backend\controllers;

use common\models\Nav;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class NavController extends Controller
 {
    public function actionViewNav()
 {
    if ( Yii::$app->user->can( '/nav/view' ) ) {
        // Fetch all Nav
        $models = Nav::find()->all();

        return $this->render( 'view-nav', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewNavDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Nav::findOne( $serialNumber );

        return $this->render( 'view-nav-details', [
            'model' => $model,
        ] );
    }

    public function actionAddNav()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['Nav/add-nav']);
        if ( Yii::$app->user->can( '/nav/add' ) ) {
            $model = new Nav();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-nav', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-nav', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/nav/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-nav', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/nav/delete')) {
            // Delete the Nav record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-nav']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Nav::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
