<?php

namespace Controllers;

class Pages extends Client{

	public function action_404(){
		$this->page404();
	}

	public function action_contacts(){
		$this->title = 'Контакты';
		$this->content = 'Контакты фирмы';
	}

	public function action_feedback()
	{
		$this->title = 'Обратная связь';
		$this->content = 'Форма обр связи';
	}
}