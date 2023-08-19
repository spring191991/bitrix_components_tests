<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arDefaultUrlTemplates404 = array(
	"list" => "",
	"element" => "#ELEMENT_ID#/",
);

$arDefaultVariableAliases404 = Array(
	"list"=>array(),
	"element"=>array(),
);

$arComponentVariables = Array(
	"ELEMENT_ID",
);

$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
$arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);

$componentPage = CComponentEngine::ParseComponentPath(
	$arParams["SEF_FOLDER"],
	$arUrlTemplates,
	$arVariables
);

if(!$componentPage)
	$componentPage = "list";

if($arVariables['ELEMENT_ID'])
	$filter = Array("ID" => $arVariables['ELEMENT_ID']);
else
	$filter = '';
$Groups = CGroup::GetList($order="ID", $by="ASC", $filter);

CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);
$arResult = array(
	"FOLDER" => $arParams["SEF_FOLDER"],
	"URL_TEMPLATES" => $arUrlTemplates,
	"VARIABLES" => $arVariables,
	"ALIASES" => $arVariableAliases,
	"GROUPS" => $Groups
);

$this->IncludeComponentTemplate($componentPage);

if($arParams["TITLE"])
	$APPLICATION->SetTitle($arParams["TITLE"]);
?>