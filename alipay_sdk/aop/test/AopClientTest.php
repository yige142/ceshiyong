<?php

require_once '../AopClient.php';
require_once '../AopCertification.php';
require_once '../request/AlipayTradeQueryRequest.php';
require_once '../request/AlipayTradeWapPayRequest.php';
require_once '../request/AlipayTradeAppPayRequest.php';


/**
 * 证书类型AopClient功能方法使用测试
 * 1、execute 调用示例
 * 2、sdkExecute 调用示例
 * 3、pageExecute 调用示例
 */


//1、execute 使用
$aop = new AopClient ();

$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '你的appid';
$aop->rsaPrivateKey = '你的应用私钥';
$aop->alipayrsaPublicKey = '你的支付宝公钥';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset = 'utf-8';
$aop->format = 'json';

$request = new AlipayTradeQueryRequest ();
$request->setBizContent("{" .
    "\"out_trade_no\":\"20150320010101001\"," .
    "\"trade_no\":\"2014112611001004680 073956707\"," .
    "\"org_pid\":\"2088101117952222\"," .
    "      \"query_options\":[" .
    "        \"TRADE_SETTE_INFO\"" .
    "      ]" .
    "  }");
$result = $aop->execute($request);
var_dump($result);


//2、sdkExecute 测试
$aop = new AopClient ();

$aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
$aop->appId = '2016073100136265';
$aop->rsaPrivateKey = 'MIIEpgIBAAKCAQEA2rWo9R9sZxEJ4/wSH3zvAeGZlrhGk4WWJv8+Mf+5emMn2K/SP18iZd9Hk9hMcSOkNp5sRa9A/nGI32It1wR0ExdVb7oQ3cuGyjAOUi01pXLIOefs32cvBbw3mE3mI1a0Sb42gbyj6KjcFxtUO3nziBMzHQlyRvr14Knithh+SpWaXfQd99J+DRxtZphinKBi+L75aeMv4Bz61jExOU7m4woNvQHJ59hs2ELIlk8kIp6yOvau6/Rxl2/xe6T+paImWVByQH9EY4PIvCJ0ipfvLdPleRwtdtYo0QLJnhg+WSYXWoYp+VhccTWYa/Yxh6QKe0cUE8Mm6MBmtVQHxZs0KwIDAQABAoIBAQC4TZtKrSdRl0cpaxLum/5hLHacTz+SM2F8DV2hDqmDnClI7akUJBw9krGjwgNw2CMar9f3xR7VDGHWNMsCRct3BxPFKhvqfAdjPKnk0BpECPz35xxyimZSw/BplUOZhgg5mGQgYhISDrIherM5x6PUiLFrB7nYXMV0hFT7NJrAR9DQNokSIq2owMpAYFTvs5VFgEMzPNNKOgsex+VsslbOPdt7QYy3KDrmPqusv6SmHHbhnbJEsuOr6kIEaon0fkBDwXVzTYjS7GngxGj+kfMzvxTYfODozcWXGWiha05pSPQ9Tr2jIA9yIhbGkkWgSH49QJ8jqeDnmQh0i9cE+ZARAoGBAO+PGhAN5jzJ9wps0HabFe1jrOXRE1mc8Za3+xqKRP7OfbxGOvnDFcgk6uB6SiEa8xSx8tf5QBnCOtku3krhD7BhoE2LDvxWXMLYvdFI3yz+LfBkvg00We+0i8aWPAk11xiqz9rEXlLFqxom30znGRlvpVK82TC15ubX3mDv13fjAoGBAOm4P3UUwCjAuzGj5d6vBgCik2MvRcvpSFsuhyIbd310K0NhjQhi7RW/MFkynHG/elh4yKL85aJmJdlvmXanh8EOe07Yg8zzghrsRMLWgA34z1zdJIPnbuwZWZLWAIDu9+qLVpCv+pPVE5J2m/0hyWt+5r4GG/rWIxFgluTuj7UZAoGBAIkFE8Ys/Qy2BCwdUxsT13Xhdio47NVr1C796o0imxYXK4m9rcvfzpycqQ9eQvoufOzQX3MyqHxTQO+qRBEWK7AaFuNjb13bU9FKwT9sa+JDPClspdvNnsdhQDWFBq/J8M62HI8nlD/JufUKWNyWrh+DYU8ynxOiZ4CP5i0R4e87AoGBAIOfS714Di/lOobeMpqSHuNEq5R0Du6jVihjr565sTVpsuOjkHVkoPhaT7QsGIbGuvQQMY34tqoatL4bZ2W3O3Cx4yeoL7HAgUkAPkkr27oCoWU+9U2DjKhSLmvPMUFrUxs3lWyuboPKv9cADSElYfWz5eamMiO1bNJgfxo2b6AhAoGBAMP36SEa/VCfC+c65T2UosccJcpSxfrUTOGhEykr5Y4nQnVdBBKR5g3JE/0cD9wo1Ti2nIsiK7c2b8AzeM4frRviXhL7NQoO4spb+ZD95wOrm8tjhPyOKhZwSoSqtq66iQj+btsrq0UzRujI1qkIV+fhdaCsn9sXzZKllJW5qjOb';
$aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2rWo9R9sZxEJ4/wSH3zvAeGZlrhGk4WWJv8+Mf+5emMn2K/SP18iZd9Hk9hMcSOkNp5sRa9A/nGI32It1wR0ExdVb7oQ3cuGyjAOUi01pXLIOefs32cvBbw3mE3mI1a0Sb42gbyj6KjcFxtUO3nziBMzHQlyRvr14Knithh+SpWaXfQd99J+DRxtZphinKBi+L75aeMv4Bz61jExOU7m4woNvQHJ59hs2ELIlk8kIp6yOvau6/Rxl2/xe6T+paImWVByQH9EY4PIvCJ0ipfvLdPleRwtdtYo0QLJnhg+WSYXWoYp+VhccTWYa/Yxh6QKe0cUE8Mm6MBmtVQHxZs0KwIDAQAB';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset = 'utf-8';
$aop->format = 'json';

$request = new AlipayTradeAppPayRequest ();
$request->setBizContent("{" .
    "\"timeout_express\":\"90m\"," .
    "\"total_amount\":\"9.00\"," .
    "\"product_code\":\"QUICK_MSECURITY_PAY\"," .
    "\"body\":\"Iphone6 16G\"," .
    "\"subject\":\"大乐透\"," .
    "\"out_trade_no\":\"70501111111S001111119\"," .
    "\"time_expire\":\"2016-12-31 10:05\"," .
    "\"goods_type\":\"0\"," .
    "\"promo_params\":\"{\\\"storeIdType\\\":\\\"1\\\"}\"," .
    "\"passback_params\":\"merchantBizType%3d3C%26merchantBizNo%3d2016010101111\"," .
    "\"extend_params\":{" .
    "\"sys_service_provider_id\":\"2088511833207846\"," .
    "\"hb_fq_num\":\"3\"," .
    "\"hb_fq_seller_percent\":\"100\"," .
    "\"industry_reflux_info\":\"{\\\\\\\"scene_code\\\\\\\":\\\\\\\"metro_tradeorder\\\\\\\",\\\\\\\"channel\\\\\\\":\\\\\\\"xxxx\\\\\\\",\\\\\\\"scene_data\\\\\\\":{\\\\\\\"asset_name\\\\\\\":\\\\\\\"ALIPAY\\\\\\\"}}\"," .
    "\"card_type\":\"S0JP0000\"" .
    "    }," .
    "\"merchant_order_no\":\"20161008001\"," .
    "\"enable_pay_channels\":\"pcredit,moneyFund,debitCardExpress\"," .
    "\"store_id\":\"NJ_001\"," .
    "\"specified_channel\":\"pcredit\"," .
    "\"disable_pay_channels\":\"pcredit,moneyFund,debitCardExpress\"," .
    "      \"goods_detail\":[{" .
    "        \"goods_id\":\"apple-01\"," .
    "\"alipay_goods_id\":\"20010001\"," .
    "\"goods_name\":\"ipad\"," .
    "\"quantity\":1," .
    "\"price\":2000," .
    "\"goods_category\":\"34543238\"," .
    "\"categories_tree\":\"124868003|126232002|126252004\"," .
    "\"body\":\"特价手机\"," .
    "\"show_url\":\"http://www.alipay.com/xxx.jpg\"" .
    "        }]," .
    "\"ext_user_info\":{" .
    "\"name\":\"李明\"," .
    "\"mobile\":\"16587658765\"," .
    "\"cert_type\":\"IDENTITY_CARD\"," .
    "\"cert_no\":\"362334768769238881\"," .
    "\"min_age\":\"18\"," .
    "\"fix_buyer\":\"F\"," .
    "\"need_check_info\":\"F\"" .
    "    }," .
    "\"business_params\":\"{\\\"data\\\":\\\"123\\\"}\"," .
    "\"agreement_sign_params\":{" .
    "\"personal_product_code\":\"CYCLE_PAY_AUTH_P\"," .
    "\"sign_scene\":\"INDUSTRY|DIGITAL_MEDIA\"," .
    "\"external_agreement_no\":\"test20190701\"," .
    "\"external_logon_id\":\"13852852877\"," .
    "\"access_params\":{" .
    "\"channel\":\"ALIPAYAPP\"" .
    "      }," .
    "\"sub_merchant\":{" .
    "\"sub_merchant_id\":\"2088123412341234\"," .
    "\"sub_merchant_name\":\"滴滴出行\"," .
    "\"sub_merchant_service_name\":\"滴滴出行免密支付\"," .
    "\"sub_merchant_service_description\":\"免密付车费，单次最高500\"" .
    "      }," .
    "\"period_rule_params\":{" .
    "\"period_type\":\"DAY\"," .
    "\"period\":3," .
    "\"execute_time\":\"2019-01-23\"," .
    "\"single_amount\":10.99," .
    "\"total_amount\":600," .
    "\"total_payments\":12" .
    "      }" .
    "    }" .
    "  }");
$result = $aop->sdkExecute($request);

$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
echo $responseNode;
$resultCode = $result->$responseNode->code;
if (!empty($resultCode) && $resultCode == 10000) {
    echo "成功";
} else {
    echo "失败";
}


//3、pageExecute 测试
$aop = new AopClient ();

$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '你的appid';
$aop->rsaPrivateKey = '你的应用私钥';
$aop->alipayrsaPublicKey = '你的支付宝公钥';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset = 'utf-8';
$aop->format = 'json';

$request = new AlipayTradeWapPayRequest ();
$request->setBizContent("{" .
    "    \"body\":\"对一笔交易的具体描述信息。如果是多种商品，请将商品描述字符串累加传给body。\"," .
    "    \"subject\":\"测试\"," .
    "    \"out_trade_no\":\"70501111111S001111119\"," .
    "    \"timeout_express\":\"90m\"," .
    "    \"total_amount\":9.00," .
    "    \"product_code\":\"QUICK_WAP_WAY\"" .
    "  }");
$result = $aop->pageExecute($request);
echo $result;


