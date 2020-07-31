<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//传输方式
use GuzzleHttp\Client;
class TestController extends Controller
{
    //鐧诲綍鏂规硶
    public function Login(){
        $name = request()->get("name");
        $email = request()->get("email");
        $data = [
            "name" => $name,
            "email" =>$email
        ];
        dd($data);
    }

    public function index(){
        $url = "http://api.1911.com/user/Info";
        $desc=file_get_contents($url);
        dd($desc);

    }
    //
    public function info(){
        $appid = "wx57336fc970e851dd";
        $appserice = "60055b853d5141421d3b33f92846f420";
        $desc = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appserice;
        $asc = file_get_contents($desc);
        echo $asc;
    }



    //对称加密调用接口加密
    public function proensll(){
        $data  = "hello world";    //待加密的明文信息数据。
        $method = "AES-128-CBC";    //密码学方式。openssl_get_cipher_methods() 可获取有效密码方式列表。
        $key = "api1911";           //key。
       //options 是以下标记的按位或： OPENSSL_RAW_DATA 、 OPENSSL_ZERO_PADDING。
        $iv = "aaaabbbbccccdddd";   //非 NULL 的初始化向量。
        echo "<pre>";echo "原始 ：".$data;echo "</pre>";
        $name = openssl_encrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);   //echo openssl_error_string();die;用来解决问题
        //将数据进行转码
        $names = base64_encode($name);
        /*
        *urlencode
        *是一个函数，可将字符串以URL编码，用于编码处理。URL编码(URL encoding)，也称作百分号编码(Percent-encoding)，
            是特定上下文的统一资源定位符 (URL)的编码机制。
        适用于统一资源标识符(URI)的编码，也用于为"application/x-www-form-urlencoded" MIME准备数据， 
        因为它用于通过HTTP的请求操作(request)提交HTML表单数据
        */
        $namese = urlencode($names);
        $url = "http://api.1911.com/user/openssl";
        $desc = $url."?data=".$namese;
        $values = file_get_contents($desc);
        echo "<pre>";echo "加密：".$values;echo "</pre>";
    }



    //非对称加密
    public function aesc(Request $request){
        //内容
        $data = "留得青山在，不怕没柴烧";
        // $name 这将保存加密的结果。
        $contents = file_get_contents(storage_path("keys/pub.key"));
        $key = openssl_get_publickey($contents);
        //加密方法
        /*
        padding
            padding can be one of OPENSSL_PKCS1_PADDING, 
            OPENSSL_SSLV23_PADDING, OPENSSL_PKCS1_OAEP_PADDING,
            OPENSSL_NO_PADDING.
        */
        openssl_public_encrypt($data,$name,$key,OPENSSL_PKCS1_OAEP_PADDING);
        //转码
        $names = base64_encode($name);
        //路径
        $url= "http://api.1911.com/user/aesc1";
        //实例化post调接口方式
        $client = new Client;
        $response =  $client->request("post",$url,[
            "form_params" => [
                "name" => $names,
            ],
        ]);

        echo $response->getBody();
    }



    //验证标签
    public function desc(){
      $data = request()->get("data");
      $shal = request()->get("shal");
      $key = "1911_api";
      $name = sha1($data.$key);
      // dd($name);
      if($shal == $name){
        echo "验签通过";
      }else{
        echo "验签不通过";
      }
    }


    /*
        /私钥加密标签
            openssl_sign()使用与priv_key_id关联的私钥生成加密数字签名，
            从而为指定数据计算签名。注意，数据本身没有加密。
    */
    public function desc1(){
        $data = "你好 api";
        $url = "http://api.1911.com/user/desc1";
        //私钥
        $priv_key = file_get_contents(storage_path("keys/www.priv.key"));
        //进行加密
        openssl_sign($data,$name,$priv_key,OPENSSL_ALGO_SHA1);
        //转码步骤
        $names = base64_encode($name);
        $client = new Client;
         $response = $client->request('POST',$url,[
            'form_params' => [
                'name' => $names,
                "data" => $data,
            ]
        ]);
         // 使用 getBody 方法可以获取响应的主体部分(body)，
         // 主体可以当成一个字符串或流对象使用
         echo $response->getBody();
    }



    //非对称加密回应
    public function desc2(){
        dd('idfu');
    }

    //Header
    public function header(){
        dd("fdkj");
    }





}
