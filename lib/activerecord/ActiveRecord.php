<?php
if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50300)
	die('PHP ActiveRecord requires PHP 5.3 or higher');

define('PHP_ACTIVERECORD_VERSION_ID','1.0');

include_once dirname(__FILE__) .'/Singleton.php';
include_once dirname(__FILE__) .'/Config.php';
include_once dirname(__FILE__) .'/Utils.php';
include_once dirname(__FILE__) .'/DateTime.php';
include_once dirname(__FILE__) .'/Model.php';
include_once dirname(__FILE__) .'/Table.php';
include_once dirname(__FILE__) .'/ConnectionManager.php';
include_once dirname(__FILE__) .'/Connection.php';
include_once dirname(__FILE__) .'/SQLBuilder.php';
include_once dirname(__FILE__) .'/Reflections.php';
include_once dirname(__FILE__) .'/Inflector.php';
include_once dirname(__FILE__) .'/CallBack.php';
include_once dirname(__FILE__) .'/Exceptions.php';

spl_autoload_register('activerecord_autoload');

function activerecord_autoload($class_name)
{
	$path = ActiveRecord\Config::instance()->get_model_directory();
	$root = realpath(isset($path) ? $path : '.');

	if (($namespaces = ActiveRecord\get_namespaces($class_name)))
	{
		$class_name = array_pop($namespaces);
		$directories = array();

		foreach ($namespaces as $directory)
			$directories[] = $directory;

		$root .= DIRECTORY_SEPARATOR . implode($directories, DIRECTORY_SEPARATOR);
	}

	$file = "$root/$class_name.php";

	if (file_exists($file))
		require $file;
}
?>
