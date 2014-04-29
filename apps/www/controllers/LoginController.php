<?php

class LoginController extends ControllerBase {

	public function indexAction() {
		
	}

	public function checkAction() {
		if (!$this->request->isPost()) {
			$this->flashSession->error('非法请求，请重新登录。');
			$this->redirect('login/index');
		}

		if (!$this->security->checkToken()) {
			$this->flashSession->error('提交超时，请重新登录。');
			$this->redirect('login/index');
		}

		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');

		$user = Users::findFirst(array(
					'email = :email:',
					'bind' => ['email' => $email]
		));

		if ($user == FALSE) {
			$this->flashSession->error('登录失败');
			$this->redirect('login/index');
		}

		if (!$this->security->checkHash($password, $user->password)) {
			$this->flashSession->error('密码错误');
			$this->redirect('login/index');
		}


		$this->session->set('identity', $user->id);
		$this->session->set('email', $user->email);
		$this->session->set('fullname', $user->fullname);
		$this->session->set('showname', $user->fullname ? $user->fullname : $user->email);

		$this->flashSession->success('登录成功!');
		$this->redirect('index/index');
	}
}
