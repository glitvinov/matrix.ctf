<?php

class NeoController extends Controller
{

    public function actionIndex()
    {
        echo 'Hello Neo!';die;
    }

    public function actionsetManager($id = null)
    {
        $model = Users::model()->findByPk($id);
        $model->role = "Manager";
        $model->save();

        $this->redirect(array('site/profile', 'id' => $id));
    }

    public function actionsetWorker($id = null)
    {
        $model = Users::model()->findByPk($id);
        $model->role = "Worker";
        $model->save();

        $this->redirect(array('site/profile', 'id' => $id));
    }
}




