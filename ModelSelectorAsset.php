<?php
namespace pavlm\modelSelector;

use yii\web\AssetBundle;

class ModelSelectorAsset extends AssetBundle
{
    public $js = [
        'model-selector.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    public $publishOptions = [];
    
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
    
}
