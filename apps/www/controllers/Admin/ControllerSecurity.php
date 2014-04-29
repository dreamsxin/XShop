<?php
namespace Admin;

abstract class ControllerSecurity extends \ControllerBase {

	private $_user;
	
	public function beforeExecuteRoute($dispatcher) {
		parent::beforeExecuteRoute($dispatcher);
		\Phalcon\Tag::appendTitle('管理');
		/* 判断权限 */
		if (!$this->session->get('identity')) {
			$this->response->redirect('login/index');	
			return FALSE;
		}
	}
	
	public function afterExecuteRoute($dispatcher) {
		parent::afterExecuteRoute($dispatcher);
	}
	
	public function getUser() {
		if (!$this->_user) {
			$this->_user = \Users::findFirst(array(
				'id = :id:',
				'bind' => array('id' => $this->session->get('identity'))
			));
		}
		
		return $this->_user;
	}

}
