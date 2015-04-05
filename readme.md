#Multi-language in Codeigniter as a Hook

This document describes how to do multi-language support in codeigniter 2.x using hooks .

#installation
Please put files as in a folder structure for this git repository and do this modification to the config.php file .

Add this code 
```$config['short_language']	= 'en';
 $config['system_lang'] = array ('ar'=>'arabic','en'=>'english');```

This code adds support for two languages (Arabic and English) you can add as many as you want and define it's codes as you wish i.e. (ara for Arabic ,ru for Russian or whatever ).

With no extra configuration. you just need to create languages folders. i.e. (Arabic and English) inside `application/languages` folder and add `general_lang.php` for each one.

#Example
To show word `hello` in booth languages. you have to create this key inside booth files `general_lang.php` inside Arabic folder and English folder 

```$lang['hello'] = 'Hello'; This for english folder
$lang['hello'] = 'مرحبا'; This for arabic folder```

And at view,or controller or even model you can call `echo lang('hello');`

Thanks to mHisham, you must enable hooks in config file
``$config['enable_hooks'] = true;``

Last thing 
add these lines in routers.php for each language you need i.e(Arabic and english here).
``$route['^ar/(.+)$'] = "$1";
$route['^en/(.+)$'] = "$1";

$route['^ar$'] = $route['default_controller'];
$route['^en$'] = $route['default_controller'];``

##That's all
Please feel free to ask for any modification or report bugs <br/>
Thanks.
