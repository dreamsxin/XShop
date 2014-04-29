<?php

class RegisterController extends ControllerBase {

	public function indexAction() {
	}

	public function checkAction() {
		if (!$this->request->isPost()) {
			$this->flashSession->error('非法请求，请重新注册。');
			return $this->redirect('register/index');
		}

		if (!$this->security->checkToken()) {
			$this->flashSession->error('提交超时，请重新提交注册。');
			return $this->redirect('register/index');
		}


		$email = $this->request->getPost('email', 'email');
		$password = $this->request->getPost('password');
		$phone = $this->request->getPost('phone');
		$idcard = $this->request->getPost('idcard');

		$fullname = $this->request->getPost('fullname');
		$sex = $this->request->getPost('sex');
		$birthdate = $this->request->getPost('birthdate');
		$address = $this->request->getPost('address');

		if (strlen($password) < 6) {
			$this->flashSession->error('密码必须大于等于6位');
			return $this->redirect('register/index');
		}

		$user = new Users();
		$user->email = $email;
		$user->phone = $phone;
		$user->password = $this->security->hash($password);
		$user->idcard = $idcard;
		$user->imei = $imei;

		$user->fullname = $fullname;
		$user->sex = $sex;
		$user->birthdate = $birthdate;
		$user->address = $address;

		if ($user->save() == TRUE) {
			$this->flashSession->error('注册成功');
			return $this->redirect('login/index');
		} else {
			$result = 'Failure value, ';
			foreach ($user->getMessages() as $message) {
				$result .= PHP_EOL.$message->getMessage();
			}
			
			$this->flashSession->error('注册失败，'.$result);
			return $this->redirect('register/index');
		}
	}

}
