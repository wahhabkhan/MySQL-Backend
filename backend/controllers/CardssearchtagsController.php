<?php

namespace backend\controllers;

use common\models\Cardssearchtags;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class CardssearchtagsController extends Controller
 {
    public function actionViewCardssearchtags()
 {
    if ( Yii::$app->user->can( '/regions/view' ) ) {
        // Fetch all Cardssearchtags
        $models = Cardssearchtags::find()->all();

        return $this->render( 'view-cardssearchtags', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }

    }

    public function actionViewCardssearchtagsDetails( $tag_name )
 {
        // Fetch the contact record to ensure it exists
        $model = Cardssearchtags::findOne( $tag_name );

        return $this->render( 'view-cardssearchtags-details', [
            'model' => $model,
        ] );
        
    }

    public function actionAddCardssearchtags()
 {
        if ( Yii::$app->user->can( '/regions/add' ) ) {
            $model = new Cardssearchtags();

            if ( $this->request->isPost ) {
                if ( $model->load( $this->request->post() ) && $model->save() ) {
                    return $this->redirect( [ 'view-cardssearchtags', 'tag_name' => $model->tag_name ] );
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render( 'add-cardssearchtags', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $tag_name )
 {
        if ( Yii::$app->user->can( '/regions/update' ) ) {
            $model = $this->findModel( $tag_name );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-cardssearchtags', 'tag_name' => $model->tag_name ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($tag_name)
    {
        if (Yii::$app->user->can('/regions/delete')) {
            // Delete the Cardssearchtags record directly
            $this->findModel($tag_name)->delete();
            return $this->redirect(['view-cardssearchtags']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $tag_name )
 {
        if ( ( $model = Cardssearchtags::findOne( [ 'tag_name' => $tag_name ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
