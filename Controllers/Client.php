<?php

namespace Controllers;

use Models\Template;

class Client extends Base{
	protected $title;
	protected $content;

	public function __construct(){
		parent::__construct();

		$this->title = '';
		$this->content = '';
	}

	public function render(){
		return Template::render('v_main', [
			'title' => $this->title,
			'content' => $this->content
		]);
	}
}