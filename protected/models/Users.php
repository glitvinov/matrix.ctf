<?phphelp | webapp | yii | logout

Generators
Controller Generator
Crud Generator
Form Generator
Model Generator
Module Generator
Model Generator
This generator generates a model class for the specified database table.

Fields with * are required. Click on the highlighted fields to edit them.

Database Connection *
db
Table Prefix
[empty]
Table Name *
users
Model Class *
Users
Base Class *
CActiveRecord
Model Path *
application.models
Build Relations

Use Column Comments as Attribute Labels

Code Template *
default (/cloud/localhost/matrix.ctf/framework/gii/generators/model/templates/default)

Code File	Generate
models/Users.php	new

Powered by Yii Framework.
A product of Yii Software LLC.
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
            array('id, nick, tel, info, sex, password, role, email', 'required'),
            array('id', 'numerical', 'integerOnly'=>true),
            array('nick, tel, role, email, city, site', 'length', 'max'=>50),
            array('info, password', 'length', 'max'=>255),
            array('sex', 'length', 'max'=>1),
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
            'nick' => 'Nick',
            'tel' => 'Tel',
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
}
close
/cloud/localhost/matrix.ctf/protected/models/Users.php


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
			array('id, nick, tel, info, sex, password, role, email', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('nick, tel, role, email, city, site', 'length', 'max'=>50),
			array('info, password', 'length', 'max'=>255),
			array('sex', 'length', 'max'=>1),
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
			'nick' => 'Nick',
			'tel' => 'Tel',
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
}
