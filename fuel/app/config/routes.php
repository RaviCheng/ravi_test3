<?php
return array(
	'_root_'  => 'phptool',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

    /**
     * 路由網址為 phptool/(工具類型)/(來源專案) => phptool/(動作)
     * (工具類型抓取的值，使用Uri方法$2->(動作))
     */
    'phptool/phpmd'             => 'phptool/phpmd', //all路線
    'phptool/(:any)'             => 'phptool',

	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);