<?php
	
	/**
	 * -----------------------------------------------------------------------------------------
	 * Based on `https://github.com/mecha-cms/mecha-cms/blob/master/system/kernel/converter.php`
	 * -----------------------------------------------------------------------------------------
	 * GitHub Rodrigo54/php-html-css-js-minifier.php
	 */
	
	class Minifier
	{
		/**
		 * @var false|mixed
		 */
		protected $processCSS;
		
		/**
		 * @var false|mixed
		 */
		protected $processJS;
		
		/**
		 * @param $source
		 * @param $processCSS
		 * @param $processJS
		 * @return array|mixed|string|string[]|null
		 */
		public static function minify($source, $processCSS = false, $processJS = false)
		{
			$outputMinifier = new self($processCSS, $processJS);
			return $outputMinifier->minify_html($source);
		}
		
		/**
		 * @param $processCSS
		 * @param $processJS
		 */
		public function __construct($processCSS = false, $processJS = false)
		{
			$this->processCSS = $processCSS;
			$this->processJS = $processJS;
		}
		
		/**
		 * @param $input
		 * @return array|mixed|string|string[]|null
		 */
		public function minify_html($input)
		{
			if (trim($input) === "") return $input;
			// Remove extra white-space(s) between HTML attribute(s)
			$input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function ($matches) {
				return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
			}, str_replace("\r", "", $input));
			
			// Minify inline CSS declaration(s)
			if ($this->processCSS) {
				if (strpos($input, ' style=') !== false) {
					$input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function ($matches) {
						return '<' . $matches[1] . ' style=' . $matches[2] . $this->minify_css($matches[3]) . $matches[2];
					}, $input);
				}
				if (strpos($input, '</style>') !== false) {
					$input = preg_replace_callback('#<style(.*?)>(.*?)</style>#is', function ($matches) {
						return '<style' . $matches[1] . '>' . $this->minify_css($matches[2]) . '</style>';
					}, $input);
				}
			}
			
			if ($this->processJS) {
				if (strpos($input, '</script>') !== false) {
					$input = preg_replace_callback('#<script(.*?)>(.*?)</script>#is', function ($matches) {
						return '<script' . $matches[1] . '>' . $this->minify_js($matches[2]) . '</script>';
					}, $input);
				}
			}
			
			return preg_replace(
				array(
					// t = text
					// o = tag open
					// c = tag close
					// Keep important white-space(s) after self-closing HTML tag(s)
					'#<(img|input)(>| .*?>)#s',
					// Remove a line break and two or more white-space(s) between tag(s)
					'#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
					'#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
					'#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
					'#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
					'#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
					'#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
					'#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
					'#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
					// Remove HTML comment(s) except IE and noindex comment(s)
					'#\s*<!--(?!(\[if\s)|(noindex)|(\/noindex)).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s', //'#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s' - noindex fix
				),
				array(
					'<$1$2</$1>',
					'$1$2$3',
					'$1$2$3',
					'$1$2$3$4$5',
					'$1$2$3$4$5$6$7',
					'$1$2$3',
					'<$1$2',
					'$1 ',
					'$1',
					""
				),
				$input);
		}
		
		/**
		 * @param $input
		 * @return array|mixed|string|string[]|null
		 */
		public function minify_css($input)
		{
			if (trim($input) === "") return $input;
			$replaced = preg_replace(
				array(
					// Remove comment(s)
					'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
					// Remove unused white-space(s)
					'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~]|\s(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
					// Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
					'#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
					// Replace `:0 0 0 0` with `:0`
					'#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
					// Replace `background-position:0` with `background-position:0 0`
					'#(background-position):0(?=[;\}])#si',
					// Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
					'#(?<=[\s:,\-])0+\.(\d+)#s',
					// Minify string value
					'#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
					'#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
					// Minify HEX color code
					'#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
					// Replace `(border|outline):none` with `(border|outline):0`
					'#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
					// Remove empty selector(s)
					'#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
				),
				array(
					'$1',
					'$1$2$3$4$5$6$7',
					'$1',
					':0',
					'$1:0 0',
					'.$1',
					'$1$3',
					'$1$2$4$5',
					'$1$2$3',
					'$1:0',
					'$1$2'
				),
				$input);
			return str_replace('fill=none', '', $replaced); // fix for url("data:image/svg+xml,%3Csvg ...  fill='none'
		}
		
		/**
		 * @param $input
		 * @return array|mixed|string|string[]|null
		 */
		public function minify_js($input)
		{
			if (trim($input) === "") return $input;
			return preg_replace(
				array(
					'#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
					'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
					'#;+\}#',
					'#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
					'#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i'
				),
				array(
					'$1',
					'$1$2',
					'}',
					'$1$3',
					'$1.$3'
				),
				$input);
		}
	}