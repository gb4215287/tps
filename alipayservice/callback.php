<?php
header("Content-type: text/html; charset=utf-8");
//echo '<pre>';

require_once 'aop/AopClient.php';
require_once 'HttpRequst.php';
require_once 'aop/request/AlipayUserInfoShareRequest.php';
require_once 'aop/request/AlipaySystemOauthTokenRequest.php';
require_once 'config.php';
require_once 'aop/request/AlipayMarketingCampaignDrawcampTriggerRequest.php';



/**
 * alipay.system.oauth.token
 * 获取access_token和user_id
 */
$aop = new AopClient ();
$aop->gatewayUrl = $config['gatewayUrl'];
$aop->appId = $config['app_id'];
$aop->rsaPrivateKey = $config['merchant_private_key'];
$aop->alipayrsaPublicKey=$config['alipay_public_key'];
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset='UTF-8';
$aop->format='json';
$request = new AlipaySystemOauthTokenRequest ();
$request->setGrantType("authorization_code");
$request->setCode(HttpRequest::getRequest('auth_code'));
//$request->setRefreshToken("201208134b203fe6c11548bcabd8da5bb087a83b");
$result = $aop->execute ( $request);
//print_r($result);
//$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
//$resultCode = $result->$responseNode->code;
//if(!empty($resultCode)&&$resultCode == 10000){
//    echo "成功";
//} else {
//    echo "失败";
//}



/**
 * alipay.user.info.share
 * 配合支付宝会员授权接口，根据授权token，查询授权信息。
 */
//$aop = new AopClient ();
//$aop->gatewayUrl = $config['gatewayUrl'];
//$aop->appId = $config['app_id'];
//$aop->rsaPrivateKey = $config['merchant_private_key'];
//$aop->alipayrsaPublicKey=$config['alipay_public_key'];
//$aop->apiVersion = '1.0';
//$aop->signType = 'RSA2';
//$aop->postCharset='UTF-8';
//$aop->format='json';
$request = new AlipayUserInfoShareRequest ();
$accessToken = $result->alipay_system_oauth_token_response->access_token;
$result = $aop->execute ( $request , $accessToken );
//echo '109';
//print_r($result);
var_dump($result);
//$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
//$resultCode = $result->$responseNode->code;
//if(!empty($resultCode)&&$resultCode == 10000){
//    echo "成功";
//} else {
//    echo "失败";
//}


/**
 * alipay.marketing.campaign.drawcamp.trigger
 * 营销抽奖活动触发抽奖(卡卷活动)
 */
//$aop = new AopClient ();
//$aop->gatewayUrl = $config['gatewayUrl'];
//$aop->appId = $config['app_id'];
//$aop->rsaPrivateKey = $config['merchant_private_key'];
//$aop->alipayrsaPublicKey=$config['alipay_public_key'];
//$aop->apiVersion = '1.0';
//$aop->signType = 'RSA2';
//$aop->postCharset='UTF-8';
//$aop->format='json';
//$request = new AlipayMarketingCampaignDrawcampTriggerRequest ();
//$request->setBizContent("{" .
//    "\"user_id\":\"" . $result->alipay_user_info_share_response->user_id . "\"," .
//    "\"camp_id\":\"170724981385190\"," .
//    "\"bind_mobile\":\"\"," .
//    "\"camp_source\":1" .
//    " }");
//$result = $aop->execute ( $request);
//print_r($result);
//$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
//$resultCode = $result->$responseNode->code;
//if(!empty($resultCode)&&$resultCode == 10000){
//    echo "成功";
//} else {
//    echo "失败";
//}
