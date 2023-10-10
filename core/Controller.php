<?php
	
	namespace Core;
	
	class Controller extends App
	{
		/**
		 * @param string $view
		 * @param array $data
		 * @return string
		 */
		public function view(string $view, array $data = []): string
		{
			$others = [
				'url' => $this->url()
			];
			$data = array_merge($data, $others);
			return $this->view->show($view, $data);
		}
		
		
		/**
		 * @param String $path
		 * @return String
		 */
		public function url(string $path = '/'): string
		{
			return $this->env('BASE_URL') . $path;
		}
	}
	