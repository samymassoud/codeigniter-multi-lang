#Multi-language in Codeigniter as a Hook

This document describe how to do multi-language supoort in codeigniter 2.x using hooks .

#installation
Please put files as in folder structure for this git repository and do this modification to config.php file .

Add this code 
`$config['short_language']	= 'en';
 $config['system_lang'] = array ('ar'=>'arabic','en'=>'english');`

This code add support to two language (Arabic and English) you can add as many as you want and define it's codes as you wish i.e (ara for arabic ,ru for Russian or whatever ) .

##That's all
Please feel free to ask for any modification or report bugs 
Thanks
