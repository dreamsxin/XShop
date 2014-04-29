<?php

abstract class ControllerBase extends \Phalcon\Mvc\Controller {
	
	public function beforeExecuteRoute($dispatcher) {
		\Phalcon\Tag::setTitleSeparator('·');
		\Phalcon\Tag::setTitle('XShop');
	}

	public function afterExecuteRoute($dispatcher) {
		$this->assets
				->addCss('css/bootstrap.min.css')
				->addCss('css/font-awesome.min.css')
				->addCss('css/ionicons.min.css')
				->addCss('css/morris/morris.css')
				->addCss('css/jvectormap/jquery-jvectormap-1.2.2.css')
				->addCss('css/fullcalendar/fullcalendar.css')
				->addCss('css/daterangepicker/daterangepicker-bs3.css')
				->addCss('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')
				->addCss('css/AdminLTE.css');
     
		$this->assets
				->addJs('js/jquery.min.js')
				->addJs('js/jquery-ui-1.10.3.min.js')
				->addJs('js/bootstrap.min.js')
				->addJs('js/raphael-min.js')
				->addJs('js/plugins/morris/morris.min.js')
				->addJs('js/plugins/sparkline/jquery.sparkline.min.js')
				->addJs('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')
				->addJs('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')
				->addJs('js/plugins/fullcalendar/fullcalendar.min.js')
				->addJs('js/plugins/jqueryKnob/jquery.knob.js')
				->addJs('js/plugins/daterangepicker/daterangepicker.js')
				->addJs('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')
				->addJs('js/plugins/iCheck/icheck.min.js')
				->addJs('js/AdminLTE/app.js');
	}
	
	public function redirect($url) {
		$this->response->redirect($url);
		$this->response->send();
		exit;
	}

}
