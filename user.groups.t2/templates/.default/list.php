<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
?>

<?php
$APPLICATION->IncludeComponent(
	'test:user.groups.t2.list',
	'',
	Array(
		"TITLE" => "",
		'GROUPS' => $arResult['GROUPS'],
		'CACHE_TIME' => $arParams['CACHE_TIME']
	),
	$component
);
?>
