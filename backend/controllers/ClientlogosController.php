<?php

namespace backend\controllers;

use common\models\Clientlogos;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class ClientlogosController extends Controller
 {
    public function actionViewClientlogos()
 {
    if (Yii::$app->user->can('/clientlogos/view')) {
        // Fetch all Clientlogos
        $models = Clientlogos::find()->all();

        return $this->render( 'view-clientlogos', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewClientlogosDetails( $id )
 {
        // Fetch the contact record to ensure it exists
        $model = Clientlogos::findOne( $id );

        return $this->render( 'view-clientlogos-details', [
            'model' => $model,
        ] );
    }

    public function actionAddClientlogos()
    {
        if (Yii::$app->user->can('/clientlogos/add')) {
            $model = new Clientlogos();
            
            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-clientlogos', 'id' => $model->id]);
                }
            }
            
            return $this->render('add-clientlogos', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    


    public function actionUpdate( $id )
 {
        if ( Yii::$app->user->can( '/clientlogos/update' ) ) {
            $model = $this->findModel( $id );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-clientlogos', 'id' => $model->id ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('/clientlogos/delete')) {
            // Delete the Clientlogos record directly
            $this->findModel($id)->delete();
            return $this->redirect(['view-clientlogos']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $id )
 {
        if ( ( $model = Clientlogos::findOne( [ 'id' => $id ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
