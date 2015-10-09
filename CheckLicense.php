<?php
namespace octoweb\plugins;

class CheckLicense{
    
    const PATH='octo-web.ru';
    
    //\octoweb\plugins\CheckLicense::Yii2();
    public static function Yii2(){
        $data=\Yii::$app->cache->get('cheсklic');
        if($data===false){
            $serverName=str_replace(array('http://', 'www.'), array('',''), \Yii::$app->request->serverName);
            if( $curl = curl_init() ) {
                curl_setopt($curl, CURLOPT_URL, 'http://'.CheckLicense::PATH.'/lock/lic?dom='.$serverName);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
                $data = curl_exec($curl);
                curl_close($curl);
            }
            \Yii::$app->cache->set('cheсklic',$data,1);//3600);
        }
        
        if((strrpos(\Yii::$app->request->url,'/admin')!==false && $data>0) || $data>1){
            header('Refresh: 1; URL=http://'.CheckLicense::PATH.'/lock/');
        }
    }
    
}
