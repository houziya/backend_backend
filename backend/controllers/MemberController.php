<?php

namespace backend\controllers;
use common\models\ZyrjFck;
use common\models\ZyrjFckSearch;
use Yii;

class MemberController extends \yii\web\Controller
{
    public function actionList()
    {
        $searchModel = new ZyrjFckSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLock($id)
    {
        if(Yii::$app->request->isGet){
            $model = $this->findModel($id);
            $isLock = intval(Yii::$app->request->get("is_lock"));
            $model->is_lock = 1;
            if($isLock > 0){
                $model->is_lock = 0;
            }
            if($model->save(false)){
                return $this->redirect(['list']);
            }
        }

    }

    //取消级别
    public function actionCancelLevel($id)
    {
        if(Yii::$app->request->isGet){
            $model = $this->findModel($id);
            $model->jingli = 0;
            $model->zongjian = 0;
            $model->dongshi = 0;
            if($model->save(false)){
                return $this->redirect(['list']);
            }
        }

    }

    //设置受理中心
    public function actionAgent($id)
    {
        if(Yii::$app->request->isGet){
            $model = $this->findModel($id);
            $model->idt = time();
            $model->adt = time();
            $model->is_agent = 2;
            if($model->save(false)){
                return $this->redirect(['list']);
            }
        }

    }
    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ZyrjFck::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
