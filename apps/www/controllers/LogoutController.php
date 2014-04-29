<?php

class LogoutController extends ControllerBase {

	public function indexAction() {
		$this->session->destroy();
		$this->response->redirect('index');
		$this->response->send();
		exit;
	}

}
