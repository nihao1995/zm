<?php
// +------------------------------------------------------------
// | zyfunds
// +------------------------------------------------------------
// | 卓远网络：CY QQ:185017580 http://www.300c.cn/
// +------------------------------------------------------------
// | 欢迎加入卓远网络-Team，和卓远一起，精通PHPCMS
// +------------------------------------------------------------
// | 版本号：20190125
// +------------------------------------------------------------
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');

/**
 * 添加父级菜单:后台添加一个卓远商城菜单
 */

//先判断有没有卓远网络的大菜单
$zymall = $menu_db->get_one(array('name'=>'zymall','parentid'=>'0'));
if($zymall){
	$parentids =$zymall['id'];
}else{
	$parentids = $menu_db->insert(
		array(
			'name'=>'zymall',
			'parentid'=>'0',
			'm'=>'zymall',
			'c'=>'zymall',
			'a'=>'init',
			'data'=>'',
			'listorder'=>9,
			'display'=>'1'
		),
		true
	);
}
/**
 * 添加菜单:配置管理
 */

$pids = $menu_db->insert(
	array(
		'name'=>'zyshop_manage',
		'parentid'=>$parentids,
		'm'=>'zymall',
		'c'=>'zyshop_manage',
		'a'=>'init',
		'data'=>'',
		'listorder'=>0,
		'display'=>'1'
	),
	true
);

/**
 * 添加子菜单:参考管理
 */
$userid = $menu_db->insert(
	array(
		'name'=>'zyshop', //菜单名称
		'parentid'=>$pids, //添加到积分商城。
		'm'=>'zymall', //模块
		'c'=>'zyshop',//文件
		'a'=>'init', //方法
		'data'=>'', //附加参数
		'listorder'=>0, //菜单排序
		'display'=>'1' //显示菜单 1是显示 0是隐藏
	),true//插入菜单之后，是否返回id
);
/**
 * 添加子菜单:参考管理
 */
$userid = $menu_db->insert(
	array(
		'name'=>'zyshoptype', //菜单名称
		'parentid'=>$pids, //添加到积分商城。
		'm'=>'zymall', //模块
		'c'=>'zyshoptype',//文件
		'a'=>'init', //方法
		'data'=>'', //附加参数
		'listorder'=>1, //菜单排序
		'display'=>'1' //显示菜单 1是显示 0是隐藏
	),true//插入菜单之后，是否返回id
);
/**
 * 菜单名称翻译
 */
$language = array(
	'zymall'=>'商城模块',
	'zyshop_manage'=>'商品管理',
	'zyshop'=>'商品列表',
	'zyshoptype'=>'商品类型',

);

?>