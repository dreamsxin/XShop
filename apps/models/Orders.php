<?php

class Orders extends \Phalcon\Mvc\Model {

	/**
	 *
	 * @var integer
	 */
	public $id;

	/**
	 *
	 * @var integer
	 */
	public $user_id;

	/**
	 *
	 * @var integer
	 */
	public $type;

	/**
	 *
	 * @var double
	 */
	public $money;

	/**
	 *
	 * @var integer
	 */
	public $status;

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
