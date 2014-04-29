<?php

class OrderGoods extends \Phalcon\Mvc\Model {

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
	public $order_id;

	/**
	 *
	 * @var integer
	 */
	public $good_id;

	/**
	 *
	 * @var integer
	 */
	public $amount;

	/**
	 *
	 * @var double
	 */
	public $money;

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
