<?php
namespace Admin;

class IndexController extends \ControllerBase {

	public function initialize() {
		\Phalcon\Tag::appendTitle('管理首页');
	}

	public function indexAction() {
	}

}
