<?php
	
	
	namespace Core;
	
	use Jenssegers\Blade\Blade;
	use Valitron\Validator;
	
	class View
	{
		
		/**
		 * @var mixed|string
		 */
		public Mixed $path;
		
		/**
		 * @var Validator
		 */
		public Validator $validator;
		
		/**
		 * @param Validator $validator
		 * @param $theme
		 */
		public function __construct(Validator $validator, $theme = null)
		{
			if ($theme !== null) {
				$this->path = dirname(__DIR__) . '/themes/' . $theme;
			}
			$this->validator = $validator;
		}
		
		/**
		 * @param $view
		 * @param $data
		 * @return string
		 */
		public function show($view, $data = []): string
		{
			if ($this->path == null) {
				$viewPath = dirname(__DIR__) . '/public/views/';
				$cachePath = dirname(__DIR__) . '/public/cache/';
			} else {
				$viewPath = $this->path . '/views/';
				$cachePath = $this->path . '/cache/';
			}
			$blade = new Blade($viewPath, $cachePath);
			
			// Share $error variable
			$blade->share('errors', $this->validator->errors());
			
			// getError directive
			$blade->directive('getError', function ($name) {
				return '<?php if (isset($errors[' . $name . '])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors[' . $name . '][0]?></div></div></div><?php endif; ?>';
			});
			
			// Translate Directive
			$blade->directive('trans', function ($key) {
				return '<?php echo trans("' . $key . '") ?>';
			});

            $blade->directive('selected', function($eq1){
                return $eq1;
            });
			return $blade->render($view, $data);
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
	}