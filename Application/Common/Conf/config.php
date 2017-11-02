<?php
define('__BLOG__','http://lublog.com');
return array(
	//'配置项'=>'配置值'
	//定义快捷模板路径
	'TMPL_PARSE_STRING' => array(
						'__HOME__' => __ROOT__.'/Public/Home',
						'__ADMIN__' => __ROOT__.'/Public/Admin',
						'__SAMEHTML__' => __ROOT__.'/Application/Common/Common'
	),
	//常量定义


	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'lublog',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123',          // 密码
    'DB_PORT'               =>  '3306',        // 端口

	//显示跟踪信息
	'SHOW_PAGE_TRACE'       =>  true,
);