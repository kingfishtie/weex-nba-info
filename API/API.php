<?php
// +----------------------------------------------------------------------
// | JuhePHP [ NO ZUO NO DIE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2010-2015 http://juhe.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Juhedata <info@juhe.cn-->
// +----------------------------------------------------------------------
 
//----------------------------------
// NBA赛事调用示例代码 － 聚合数据
// 在线接口文档：http://www.juhe.cn/docs/92
//----------------------------------
header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin:*');
 
 
//配置您申请的appkey
$appkey = "78b2e18e8fce5cfdbb259e438e91261c";
 
 
 $p = $_GET['p'];
 
if ($p == 'index') {
//************1.NBA常规赛赛程赛果************
$url = "http://op.juhe.cn/onebox/basketball/nba";
$params = array(
      "key" => $appkey,//应用APPKEY(应用详细页查询)
      "dtype" => "json",//返回数据的格式,xml或json，默认json
);
$paramstring = http_build_query($params);
$content = juhecurl($url,$paramstring);
        print_r($content);return;
$result = json_decode($content,true);
if($result){
    if($result['error_code']=='0'){
        print_r($result);
    }else{
        echo $result['error_code'].":".$result['reason'];
    }
}else{
    echo "请求失败";
}
//**************************************************
 
} else if ($p == 'team') {
 
//************2.球队赛程赛事查询************
$url = "http://op.juhe.cn/onebox/basketball/team";
$params = array(
      "key" => $appkey,//应用APPKEY(应用详细页查询)
      "dtype" => "json",//返回数据的格式,xml或json，默认json
      "team" => "",//球队名称
);
$paramstring = http_build_query($params);
$content = juhecurl($url,$paramstring);
$result = json_decode($content,true);
if($result){
    if($result['error_code']=='0'){
        print_r($result);
    }else{
        echo $result['error_code'].":".$result['reason'];
    }
}else{
    echo "请求失败";
}
//**************************************************
 
 
} else if ($p == 'combat') {
 
//************3.球队对战赛赛程查询************
$url = "http://op.juhe.cn/onebox/basketball/combat";
$params = array(
      "key" => $appkey,//应用APPKEY(应用详细页查询)
      "dtype" => "json",//返回数据的格式,xml或json，默认json
      "hteam" => "",//主队球队名称
      "vteam" => "",//客队球队名称
);
$paramstring = http_build_query($params);
$content = juhecurl($url,$paramstring);
$result = json_decode($content,true);
if($result){
    if($result['error_code']=='0'){
        print_r($result);
    }else{
        echo $result['error_code'].":".$result['reason'];
    }
}else{
    echo "请求失败";
}
//**************************************************
 
 
 
 }
 
 
/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
 
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}