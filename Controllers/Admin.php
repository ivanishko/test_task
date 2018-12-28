<?php

namespace Controllers;

use Models\Template;

class Admin extends Base{
	protected $title;
	protected $content;
	protected $user;

	public function __construct(){
		parent::__construct();

		$this->title = '';
		$this->content = '';
		$this->user = '';

		/* проверка на авторизации */
	}

	public function render(){
		return Template::render('admin/v_main', [
			'title' => $this->title,
			'content' => $this->content
		]);
	}
}