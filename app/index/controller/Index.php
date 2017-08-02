<?php
namespace app\index\controller;
use app\common\controller\Index as commonIndex;
use think\Config;
use think\Db;
use think\Env;
use think\Request;
use think\Controller;
use think\Model;
use app\index\model\Index;
class Index extends Base{

    public function index(Request $request)
    {
        //var_dump(ORIGIN_PATH); //string(33) "/usr/servers/nginx/html/tp/public"
        //var_dump(ROOT_PATH);   //string(27) "/usr/servers/nginx/html/tp/"
        //var_dump(THINK_PATH);  //string(36) "/usr/servers/nginx/html/tp/thinkphp/"
        return $this->fetch();
    }
    public function common() 
    {
        require_once ROOT_PATH . 'alipayservice/aop/AopClient.php';
        require_once ROOT_PATH . 'alipayservice/HttpRequst.php';
        require_once ROOT_PATH . 'alipayservice/aop/request/AlipayUserInfoShareRequest.php';
        require_once ROOT_PATH . 'alipayservice/aop/request/AlipaySystemOauthTokenRequest.php';
        require_once ROOT_PATH . 'alipayservice/config.php';
        require_once ROOT_PATH . 'alipayservice/aop/request/AlipayMarketingCampaignDrawcampTriggerRequest.php';
        

        $aop = new \AopClient ();
        $aop->gatewayUrl = $config['gatewayUrl'];
        $aop->appId = $config['app_id'];
        $aop->rsaPrivateKey = $config['merchant_private_key'];
        $aop->alipayrsaPublicKey=$config['alipay_public_key'];
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $request = new \AlipaySystemOauthTokenRequest ();
        $request->setGrantType("authorization_code");
        $request->setCode(\HttpRequest::getRequest('auth_code'));
        //$request->setRefreshToken("201208134b203fe6c11548bcabd8da5bb087a83b");
        $result = $aop->execute ( $request);

        $request = new \AlipayUserInfoShareRequest ();
        $accessToken = $result->alipay_system_oauth_token_response->access_token;
        $result = $aop->execute ( $request , $accessToken );
        //2088
        $user_id = $result->alipay_user_info_share_response->user_id;
        //var_dump($user_id); //string(16) "2088202481549403"
        //return $user_id;
        //$aid = 61;
        $aid = input('aid');
        if(!empty($user_id) && $aid==64) { //指数专区
            return view('public/64');
        }else{
            return '请重新登录';
        }
    }
    public function demo() {
       //$res = R('Index/common');
       dump('this is demo');
       $res = input('id');
       //var_dump($res);
       // 实例化 User 模块
       //$User = A('Index');
       // 调用 User 模块中的方法
       //$res  = $User->common();
       //var_dump($res);
       return view('public/64');
    }
    public function info($id) {
       return $id;  
    }
}
