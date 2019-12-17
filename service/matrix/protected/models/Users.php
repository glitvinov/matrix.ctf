<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $nick
 * @property string $tel
 * @property string $info
 * @property string $sex
 * @property string $password
 * @property string $role
 * @property string $email
 * @property string $city
 * @property string $site
 */
class Users extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nick, password, email', 'required'),
            array('nick, tel, role, email, city, site', 'length', 'max'=>50),
            array('info, password', 'length', 'max'=>255),
            array('sex', 'length', 'max'=>1),
            array('id, nick, email', 'unique'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nick, tel, info, sex, password, role, email, city, site', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'nick' => 'Username',
            'tel' => 'Telephone',
            'info' => 'Info',
            'sex' => 'Sex',
            'password' => 'Password',
            'role' => 'Role',
            'email' => 'Email',
            'city' => 'City',
            'site' => 'Site',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('nick',$this->nick,true);
        $criteria->compare('tel',$this->tel,true);
        $criteria->compare('info',$this->info,true);
        $criteria->compare('sex',$this->sex,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('role',$this->role,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('site',$this->site,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function checkAuth()
    {
        $value = false;
        if (isset($_COOKIE['LoginCookie'])) {
            $cookiestr = base64_decode($_COOKIE['LoginCookie']);
            $cookiestr = explode(':',$cookiestr);
            $user = self::model()->findByAttributes(array('nick' => $cookiestr[0]));
            if(!empty($user)) {
                if ($user->password == $cookiestr[1]) {
                    $value = true;
                } else {
                    setcookie("LoginCookie", "", time() - 3600);
                }
            }else {
                setcookie("LoginCookie", "", time() - 3600);
            }
        }
        return $value;
    }

    public static function myId()
    {
        $value = null;
        if (isset($_COOKIE['LoginCookie'])) {
            $cookiestr = base64_decode($_COOKIE['LoginCookie']);
            $cookiestr = explode(':',$cookiestr);
            $user = self::model()->findByAttributes(array('nick' => $cookiestr[0]));
            if(!empty($user)) {
                $value = $user->id;
            }
        }
        return $value;
    }

    public static function myNick()
    {
        $value = null;
        if (isset($_COOKIE['LoginCookie'])) {
            $cookiestr = base64_decode($_COOKIE['LoginCookie']);
            $cookiestr = explode(':',$cookiestr);
            $user = self::model()->findByAttributes(array('nick' => $cookiestr[0]));
            if(!empty($user)) {
                $value = $user->nick;
            }
        }
        return $value;
    }

    public function getSex()
    {
        if($this->sex == "M")
            return "Male";
        elseif ($this->sex == "F")
            return "Female";
        else
            return "Other Gender";
    }

    /* @var $model Users */
    public static function showAttribute($model, $attr = null)
    {
        $text = '';
        if(!empty($attr)){
            $text = '<div class="form-group">';
            $text .= '<div class="col-sm-4" name="title-'.$attr.'"><h3 style="margin: 0px; text-decoration: underline;">'.$model->getAttributeLabel($attr).':</h3></div>';
            if($attr != 'sex') {
                $text .= '<div class="col-sm-6" name="'.$attr.'"><h3 style="margin: 0px;">' . $model->getAttribute($attr) . '</h3></div>';
            }else{
                $text .= '<div class="col-sm-6" name="'.$attr.'"><h3 style="margin: 0px;">' . $model->getSex() . '</h3></div>';
            }
            $text .= '</div>';
        }
        return $text;
    }

    /* @var $model Users */
    public static function showPhotobute($photo, $attr = null)
    {
        if($photo != '') {
            return '<div class="form-group">
                <div class="col-sm-4" name="title-\'.$attr.\'"><h3 style="margin: 0px; text-decoration: underline;">Photo:</h3></div>
                <div class="col-sm-6" name="\'.$attr.\'"><h3 style="margin: 0px;">' . '<img src="' . $photo . '" width="200px">' . '</h3></div>
            </div>';
        }
        return '';
    }

    public static function myRole()
    {
        $value = 'Guest';
        if (isset($_COOKIE['LoginCookie'])) {
            $cookiestr = base64_decode($_COOKIE['LoginCookie']);
            $cookiestr = explode(':',$cookiestr);
            if(isset($cookiestr[2])) $value = $cookiestr[2];
        }
        return $value;
    }
}
