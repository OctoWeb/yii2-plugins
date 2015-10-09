<?php
namespace octoweb\plugins;
use yii\web\AssetBundle;

class IconsAsset extends AssetBundle{

    public $sourcePath = '@vendor/octoweb/yii2-plugins';
    public $css = [
        'css/fontello.css',
    ];

}