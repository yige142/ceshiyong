<?php
//var_dump(phpinfo());

require_once './vendor/autoload.php';

use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Captcha\V20190722\CaptchaClient;
use TencentCloud\Captcha\V20190722\Models\DescribeCaptchaResultRequest;
try {

    $cred = new Credential("AKIDxqT", "kPp");
    $httpProfile = new HttpProfile();
    $httpProfile->setEndpoint("captcha.tencentcloudapi.com");

    $clientProfile = new ClientProfile();
    $clientProfile->setHttpProfile($httpProfile);
    $client = new CaptchaClient($cred, "", $clientProfile);

    $req = new DescribeCaptchaResultRequest();

    $params = array(
        "CaptchaType" => 9,
        "Ticket" => "t03bTR6LJjIFsnRdK8d0k6nQKFhGM2PfzH6F3-b_8k-AGciRNlf1FDdoXSXa3eDC0nQuVH93vD0GefcEnIyQ2txJPm3vgOJxW-3K6NidBT8U8s*",
        "UserIp" => "127.0.0.1",
        "Randstr" => "@TyJ",
        "CaptchaAppId" => 208,
        "AppSecretKey" => "0gCph9x4k-ON7QRclLuqBFQ**"
    );
    $req->fromJsonString(json_encode($params));

    $resp = $client->DescribeCaptchaResult($req);

    print_r($resp->toJsonString());
}
catch(TencentCloudSDKException $e) {
    echo $e;
}