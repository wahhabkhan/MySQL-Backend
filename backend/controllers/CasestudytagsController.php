<?php

namespace backend\controllers;

use common\models\Casestudytags;
use common\models\Casestudiescards;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class CasestudytagsController extends Controller
 {
    public function actionViewCasestudytags($case_study_name)
 {
    if ( Yii::$app->user->can( '/assign-regions/view' ) ) {
        // Fetch all Casestudytags
    //    $models = Casestudytags::find()->all();

    $casestudy = Casestudiescards::findOne( [ 'case_study_name' => $case_study_name ] );

    $models = Casestudytags::find()->where( [ 'case_study_name' => $case_study_name ] )->all();

        return $this->render( 'view-casestudytags', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewCasestudytagsDetails( $case_study_name )
 {
        // Fetch the contact record to ensure it exists
        $model = Casestudytags::findOne( $case_study_name );

        return $this->render( 'view-casestudytags-details', [
            'model' => $model,
        ] );
    }

    public function actionAddCasestudytags()
 {
        if ( Yii::$app->user->can( '/assign-regions/add' ) ) {
            $model = new Casestudytags();

            if ( $this->request->isPost ) {
                if ( $model->load( $this->request->post() ) && $model->save() ) {
                    return $this->redirect( [ 'view-casestudytags', 'case_study_name' => $model->case_study_name ] );
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render( 'add-casestudytags', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $case_study_name )
 {
        if ( Yii::$app->user->can( '/assign-regions/update' ) ) {
            $model = $this->findModel( $case_study_name );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-casestudytags', 'case_study_name' => $model->case_study_name ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($case_study_name)
    {
        if (Yii::$app->user->can('/assign-regions/delete')) {
            // Delete the career record directly
            $this->findModel($case_study_name)->delete();
            return $this->redirect(['view-casestudytags']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $case_study_name )
 {
        if ( ( $model = Casestudytags::findOne( [ 'case_study_name' => $case_study_name ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
