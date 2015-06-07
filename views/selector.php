<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Json;
use pavlm\modelSelector\ModelSelectorAsset;

/* @var $widget pavlm\modelSelector\ModelSelector */
/* @var $this yii\web\View */
ModelSelectorAsset::register($this);

$widget = $this->context;
$opts = $widget->getJSOptions();
$selected = !empty($opts['model']);
$defaultOptions = [
    'class' => 'model-selector input-group ms-input-group',
];
$wrapId = $widget->id . '-wrap';
?>

<? 
echo Html::beginTag('div', array_merge($defaultOptions, $widget->options, ['id' => $wrapId, 'data-options' => ($widget->manualInit ? $opts : null)]));
?>
	<? 
	$name = $widget->name ?: Html::getInputName($widget->model, $widget->attribute);
	echo Html::textInput($name, null, array_merge($widget->options, ['id' => $widget->id, 'class' => 'ms-field form-control'])); 
	?>
	<? if ($widget->itemLink): // !empty($opts['model']['link']) ?>
    	<? echo Html::a('<i class="glyphicon glyphicon-share-alt"></i>', 
    	    $selected ? $opts['model']['link'] : '#', 
    	    ['class' => 'btn btn-default input-group-addon ms-link', 'target' => '_blank', 'disabled' => !$selected]); ?>
	<? endif; ?>
<?
echo Html::endTag('div');
if (!$widget->manualInit) {
    $this->registerJs("\$('#".$wrapId."').modelSelector(".Json::encode($opts).");", View::POS_READY, $wrapId);
}
?>