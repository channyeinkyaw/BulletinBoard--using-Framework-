<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $cell
 */
class Users extends CActiveRecord
{
  public $password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

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
//		return array(
//			array('firstname, lastname, username, password, email, cell', 'required'),
//			array('firstname, lastname, username, password, email, cell', 'length', 'max'=>128),
//			// The following rule is used by search().
//			// Please remove those attributes that should not be searched.
//			array('id, firstname, lastname, username, password, email, cell', 'safe', 'on'=>'search'),
//		);
      // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
        return array(
        array('firstname, lastname, username, password, password_repeat, email', 'required', 'on' => 'register'),
                    array('username', 'unique'),
        array('username', 'length', 'min' => 3, 'max'=>20),
        array('password', 'length', 'min' => 8, 'max'=>32, 'on' => 'register'),
                    array('password', 'compare', 'compareAttribute' => 'password_repeat'),
        array('firstname, lastname, username, password, email', 'length', 'max'=>128),
        array('cell', 'length', 'max'=>15),
                    array('password, password_repeat, cell','safe'),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('firstname, lastname, username, email', 'safe', 'on'=>'search'),
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
//		return array(
//			'id' => 'ID',
//			'firstname' => 'Firstname',
//			'lastname' => 'Lastname',
//			'username' => 'Username',
//			'password' => 'Password',
//			'email' => 'Email',
//			'cell' => 'Cell',
//		);
      return array(
        'id' => 'ID',
        'firstname' => 'Firstname',
        'lastname' => 'Lastname',
        'username' => 'Username',
        'password' => 'Password',
        'password_repeat' => 'Password Repeat',
        'email' => 'Email',
        'cell' => 'Cell',
    );
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cell',$this->cell,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /**
 *
 * @return crypted value
 */
public function hash($value)
{
    return crypt($value);
}
 
/**
 * Encrypt password on create and on update: overload beforeSave function
 */
protected function beforeSave()
{
    if (parent::beforeSave())
    {
        $this->password = $this->hash($this->password);
        return true;
    }
    return false;
}
 
/**
 * Check if a password value correspond to the stored hashed value
 */       
public function check($value)
{
    $new_hash = crypt($value, $this->password);
    if ($new_hash == $this->password) {
        return true;
    }
    return false;
}
}