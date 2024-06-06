<?php

namespace backend\controllers;

use common\models\Successstats;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class SuccessstatsController extends Controller
 {
    public function actionViewSuccessstats()
 {
    if ( Yii::$app->user->can( '/successstats/view' ) ) {
        // Fetch all Successstats
        $models = Successstats::find()->all();

        return $this->render( 'view-successstats', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewSuccessstatsDetails( $id )
 {
        // Fetch the contact record to ensure it exists
        $model = Successstats::findOne( $id );

        return $this->render( 'view-successstats-details', [
            'model' => $model,
        ] );
    }

    public function actionAddSuccessstats()
 {
        if ( Yii::$app->user->can( '/successstats/add' ) ) {
            $model = new Successstats();

            if ( $this->request->isPost ) {
                if ( $model->load( $this->request->post() ) && $model->save() ) {
                    return $this->redirect( [ 'view-successstats', 'id' => $model->id ] );
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render( 'add-successstats', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $id )
 {
        if ( Yii::$app->user->can( '/successstats/update' ) ) {
            $model = $this->findModel( $id );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-successstats', 'id' => $model->id ] );
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
        if (Yii::$app->user->can('/successstats/delete')) {
            // Delete the Successstats record directly
            $this->findModel($id)->delete();
            return $this->redirect(['view-successstats']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $id )
 {
        if ( ( $model = Successstats::findOne( [ 'id' => $id ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
