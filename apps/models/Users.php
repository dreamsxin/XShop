<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Users extends \Phalcon\Mvc\Model {

	/**
	 *
	 * @var integer
	 */
	public $id;

	/**
	 *
	 * @var string
	 */
	public $email;

	/**
	 *
	 * @var string
	 */
	public $phone;

	/**
	 *
	 * @var string
	 */
	public $password;

	/**
	 *
	 * @var string
	 */
	public $idcard;

	/**
	 *
	 * @var string
	 */
	public $fullname;

	/**
	 *
	 * @var integer
	 */
	public $sex;

	/**
	 *
	 * @var integer
	 */
	public $age;

	/**
	 *
	 * @var string
	 */
	public $birthdate;

	/**
	 *
	 * @var string
	 */
	public $address;

	/**
	 *
	 * @var integer
	 */
	public $active;

	/**
	 *
	 * @var integer
	 */
	public $verify;

	/**
	 *
	 * @var string
	 */
	public $updated;

	/**
	 *
	 * @var string
	 */
	public $created;

	/**
	 * Validations and business logic
	 */
	public function validation() {
		$this->validate(new Email(["field" => "email",	"required" => true]));
		$this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness(array(
			'field' => 'email'
		)));
		if ($this->validationHasFailed() == true) {
			return false;
		}
	}

	/**
	 * Initialize method for model.
	 */
	public function initialize() {
		$this->useDynamicUpdate(true);
		$this->skipAttributes(array('created'));
	}
	
    public function beforeCreate()
    {
    }

    public function beforeUpdate()
    {
        $this->updated = date('Y-m-d H:i:s');
    }

}
