<?php

    use Arrilot\DotEnv\DotEnv;
    use Carbon\Carbon;
    use Core\Auth;
    use Core\Crypto;
    use Core\Csrf;
    use Core\Redirect;
    use Core\Slug;
    use Core\Translate;
    use Core\Upload;

/**
	 * @param String $key
	 * @param String $default
	 * @return mixed
	 */
	function sysConfig(string $key, string $default = ''): mixed
	{
		DotEnv::load(dirname(__DIR__) . '/.env.php');
		return DotEnv::get($key, $default);
	}

	/**
	 * @param $name
	 * @return false|string
	 */
	function cookie($name): false|string
	{
		if (isset($_COOKIE[$name])) {
			return rawurldecode($_COOKIE[$name]);
		}
		return false;
	}


	/**
	 * @param $url
	 * @return \Core\Redirect
	 */
    function redirect($url = null): Redirect
    {
        return Redirect::getInstance($url);
    }

    function crypto(): Crypto
    {
        return Crypto::getInstance();
    }

	/**
	 * @param string|null $url
	 * @param string|null $msg
	 * @return void
	 */
	function redirectTo(string $url = null, string $msg = null): void
	{
		if ($msg == null) {
			redirect($url)->send();
		} else {
			redirect($url)->with($msg)->send();
		}
	}

        /**
         * @param $name
         * @return array|false|string|string[]
         */
    function post($name): array|false|string
    {
        if (isset($_POST[$name])) {
            if (is_array($_POST[$name])) {
                return array_map(function ($item) {
                    return htmlspecialchars(strip_tags(trim($item)));
                }, $_POST[$name]);
            }
            return htmlspecialchars(strip_tags(trim($_POST[$name])));
        }
        return false;
    }

    function form($string): string
    {
        return htmlspecialchars(strip_tags(trim($string)));
    }

	/**
	 * @param $name
	 * @return array|false|string|string[]
	 */
	function get($name): array|false|string
	{
		if (isset($_GET[$name])) {
			if (is_array($_GET[$name])) {
				return array_map(function ($item) {
					return htmlspecialchars(strip_tags(trim($item)));
				}, $_GET[$name]);
			}
			return htmlspecialchars(strip_tags(trim($_GET[$name])));
		}
		return false;
	}

	/**
	 * @return \Carbon\Carbon
	 */
	function carbon(): Carbon
	{
		return new Carbon();
	}


    /**
     * @param String $path
     * @return string
     */
    function siteUrl(string $path = ''): string
    {
        return sysConfig('BASE_URL') . '/admin/' . $path;
    }

    function imageUrl(string $path = ''): string
    {
        return sysConfig('BASE_URL') . '/' . $path;
    }

	/**
	 * @param $path
	 * @return string
	 */
	function themeAssets($path): string
	{
		return sysConfig('BASE_URL') . '/' . 'themes/' . sysConfig('THEME') . '/assets/' . $path;
	}

	/**
	 * @return \Core\Auth
	 */
	function auth(): Auth
	{
		return Auth::getInstance();
	}

	/**
	 * @return \Core\Csrf
	 */
	function xssToken(): Csrf
	{
		return new Csrf();
	}

	/**
	 * @return string
	 */
	function csrf_field(): string
	{
		return "<input type=\"hidden\" class=\"form-control\" name=\"_token\" value=\"" . xssToken()->getToken() . "\" />";
	}

	/**
	 * @param $name
	 * @return \Core\Upload
	 */
	function upload($name): Upload
	{
		return Upload::getInstance($name);
	}

	/**
	 * @param $url
	 * @return \Core\Slug
	 */
	function slug($url): Slug
	{
		return Slug::getInstance($url);
	}

	/**
	 * @param String $key
	 * @param Array $params
	 * @return String
	 */
	function trans(string $key, array $params = []): string
	{
		$translate = new Translate(sysConfig('LOCALE', 'fr'));
		return $translate->translate($key, $params);
	}

	/**
	 * @param array|object $elements
	 * @param int $id
	 * @return array
	 */
	function buildCategory(array|object $elements, int $id = 0): array
	{
		$branch = [];
		foreach ($elements as $element){
			if ($element->top == $id){
				$child = buildCategory($elements, $element->id);

				if ($child){
					$element->child = $child;
				} else {
					$element->child = [];
				}

				$branch[] = $element;
			}
		}
		return json_decode(json_encode($branch), true);
	}

	/**
	 * @param $elements
	 * @param int $id
	 * @param int $counter
	 * @param string $prefix
	 * @return array
	 */
	function listArray($elements, int $id = 0, int $counter = 0, string $prefix = ''): array
	{
		static $array = [];
		foreach ($elements as $element) {
			if ($element->top == $id) {
				$array[$element->id] = [
					'name' => str_starts_with(((!$prefix == '') ? $prefix . ' → ' : '') . $element->name, ' → ') ? substr_replace(((!$prefix == '') ? $prefix . ' → ' : '') . $element->name, '', '1', '4') : ((!$prefix == '') ? $prefix . ' → ' : '') . $element->name,
					'data' => $element
				];
				listArray($elements, $element->id, $counter + 3, $prefix . ' → ' . $element->name);
			}
		}
		return $array;
	}

        /**
         * @param string $paragraph
         * @param int $word
         * @param string|null $overflow
         * @return string
         */
    function shorter(string $paragraph, int $word = 5, ?string $overflow = '...'): string
    {
        $data = explode(' ', $paragraph);
        $count = count($data);

        if ($count <= $word) {
            return $paragraph;
        }

        $shortened = implode(' ', array_slice($data, 0, $word));

        if ($overflow !== null) {
            $shortened .= $overflow;
        }

        return $shortened;
    }

    function xml_decode(string $xml): array
    {
        $new = simplexml_load_string($xml);
        $con = json_encode($new);
        return json_decode($con, true);
    }

    function minifyJs($js): string
    {
        if (trim($js) === "") return $js;
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
            $js);
    }


    /**
     * @return string
     */
    function uuid(): string
    {
        $uuid = [
            'node'   => []
        ];

        $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
        $uuid['time_mid'] = mt_rand(0, 0xffff);
        $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
        $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
        $uuid['clock_seq_low'] = mt_rand(0, 255);

        for ($i = 0; $i < 6; $i++) {
            $uuid['node'][$i] = mt_rand(0, 255);
        }

        return sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
            $uuid['time_low'],
            $uuid['time_mid'],
            $uuid['time_hi'],
            $uuid['clock_seq_hi'],
            $uuid['clock_seq_low'],
            $uuid['node'][0],
            $uuid['node'][1],
            $uuid['node'][2],
            $uuid['node'][3],
            $uuid['node'][4],
            $uuid['node'][5]
        );
    }