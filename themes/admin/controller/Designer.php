<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	
	class Designer extends Controller
	{
		public function main(): string
		{
			return $this->view('theme-editor.main');
		}
	}