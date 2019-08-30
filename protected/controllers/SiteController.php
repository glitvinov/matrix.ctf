<?php

use http\Cookie;

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        if(isset($_POST['search'])){
            $query = Yii::app()->db->createCommand('select * from users')->queryAll();
            //var_dump($query);die;
        }
	    $this->render('index');
	}

    public function actionLogin(){
        $model=new Users;

        if(isset($_POST['Users']))
        {
            $user = $model->findByAttributes(array('nick' => $_POST['Users']['nick']));
            $login = $user->nick;
            $password = $user->password;
            $role = $user->role;
            $cookiestr = base64_encode("$login:$password:$role");
            setcookie("LoginCookie", $cookiestr);
            $this->redirect(array('index'));
        }

        $this->render('login',array('model'=>$model));
    }

	/**
	 * Displays the login page
	 */
	public function actionRegistration()
	{
		$model=new Users;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
        $validate = 'true';
		if(isset($_POST['Users']))
		{
		 	$model->attributes=$_POST['Users'];
			// validate user input and redirect to the previous page if valid
            //var_dump($model->validate());die;
            if($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }else{ $validate = 'false';}
		}
		// display the login form
		$this->render('registration',array('model'=>$model, 'validate' => $validate));
	}

    /**
     * Displays the login page
     */
    public function actionExit()
    {
        setcookie("LoginCookie", "", time()-3600);
        $this->redirect(array('index'));
    }

    /**
     * Displays the user page
     */
    public function actionProfile($id = null)
    {
        $check=0;
        if(!empty($id)){
        $model = Users::model()->findByPk($id);
        if(!empty($model)){

        }else{
            $check = 2;
            $model = New Users;
        }
        }else{
            $check = 1;
            $model = New Users;
        }
        $this->render('profile',array('model'=>$model, 'check' => $check));
    }

    public function actionGenerate()
    {
        function generate_name($length,$symbols1,$symbols2, $dop = true){
            $code = '';
            for( $i = 0; $i < (int)$length; $i++ )
            {
                if($i%2 == 0) {
                    $num = rand(1, strlen($symbols1));
                    $code .= substr($symbols1, $num - 1, 1);
                }else{
                    $num = rand(1, strlen($symbols2));
                    $code .= substr($symbols2, $num - 1, 1);
                }
            }
            if ($dop) {
                for ($i = 0; $i < 3; $i++) {
                    $num = rand(0, 9);
                    $code .= $num;
                }
            }
            return $code;
        }
        $name = generate_name(8, 'AEIOUaeiouaeiouaeiouaeiouaeiouaeiou', 'BCDFGHJKLMNPQRSTVWXYZbcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz');
        $pass = generate_name(5, 'AEIOUaeiouaeiouaeiouaeiouaeiouaeiou123456789012345678901234567890', 'BCDFGHJKLMNPQRSTVWXYZbcdfghjklmnpqrstvwxyz');
        $tel = generate_name(11, '1234567890', '1234567890', false);
        $info = generate_name(80, 'AEIOUaeiouaeiouaeiouaeiouaeiouaeiou     ', 'BCDFGHJKLMNPQRSTVWXYZbcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz     ', false);
        $sex = generate_name(1, 'MF', '', false);
        $role = (rand(0, 1))?"Manager":"Worker";
        $subemail = array('mail.ru');
        $role = $name.$subemail[rand(0, strlen($subemail))];
        echo $name;
        echo '<br />';
        echo $pass;
        echo '<br />';
        echo $tel;
        echo '<br />';
        echo $info;
        echo '<br />';
        echo $sex;
        echo '<br />';
        echo $role;

    }

}