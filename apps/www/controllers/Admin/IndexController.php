<?php
namespace Admin;

class IndexController extends ControllerSecurity {

	public function initialize() {
		\Phalcon\Tag::appendTitle('首页');
	}

	public function indexAction() {
	}

}
