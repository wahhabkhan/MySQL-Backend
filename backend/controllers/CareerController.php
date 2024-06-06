<?php

namespace backend\controllers;

use common\models\Career;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class CareerController extends Controller
 {
    public function actionViewCareer()
 {
    if ( Yii::$app->user->can( '/career/view' ) ) {
        // Fetch all Career
        $models = Career::find()->all();

        return $this->render( 'view-career', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewCareerDetails( $jobId )
 {
   
        // Fetch the contact record to ensure it exists
        $model = Career::findOne( $jobId );

        return $this->render( 'view-career-details', [
            'model' => $model,
        ] );
  
    }

    public function actionAddCareer()
    {
        if (Yii::$app->user->can('/career/add')) {
            $model = new Career();

            if ($model->load(Yii::$app->request->post())) {
                // Process file upload
                $model->jobFile = UploadedFile::getInstance($model, 'jobFile');
                
                if ($model->save()) {
                    // Upload the file if valid
                    if ($model->jobFile) {
                        $model->jobFile->saveAs('../web/uploads/' . $model->jobFile->baseName . '.' . $model->jobFile->extension);
                    }
                    return $this->redirect(['view-career', 'jobId' => $model->jobId]);
                }
            }

            return $this->render('add-career', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionUpdate( $jobId )
 {
        if ( Yii::$app->user->can( '/career/update' ) ) {
            $model = $this->findModel( $jobId );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-career', 'jobId' => $model->jobId ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($jobId)
    {
        if (Yii::$app->user->can('/career/delete')) {
            // Delete the career record directly
            $this->findModel($jobId)->delete();
            return $this->redirect(['view-career']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $jobId )
 {
        if ( ( $model = Career::findOne( [ 'jobId' => $jobId ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
