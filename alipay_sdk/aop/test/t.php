<?php

require_once '../AopClient.php';
require_once '../AopCertification.php';
require_once '../request/AlipayTradeQueryRequest.php';
require_once '../request/AlipayTradeWapPayRequest.php';
require_once '../request/AlipayTradeAppPayRequest.php';
require_once '../request/AlipayTradePagePayRequest.php';





$aop = new AopClient ();

$aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
$aop->appId = '2016073100136265';
$aop->rsaPrivateKey = 'MIIEpgIBAAKCAQEA2rWo9R9sZxEJ4/wSH3zvAeGZlrhGk4WWJv8+Mf+5emMn2K/SP18iZd9Hk9hMcSOkNp5sRa9A/nGI32It1wR0ExdVb7oQ3cuGyjAOUi01pXLIOefs32cvBbw3mE3mI1a0Sb42gbyj6KjcFxtUO3nziBMzHQlyRvr14Knithh+SpWaXfQd99J+DRxtZphinKBi+L75aeMv4Bz61jExOU7m4woNvQHJ59hs2ELIlk8kIp6yOvau6/Rxl2/xe6T+paImWVByQH9EY4PIvCJ0ipfvLdPleRwtdtYo0QLJnhg+WSYXWoYp+VhccTWYa/Yxh6QKe0cUE8Mm6MBmtVQHxZs0KwIDAQABAoIBAQC4TZtKrSdRl0cpaxLum/5hLHacTz+SM2F8DV2hDqmDnClI7akUJBw9krGjwgNw2CMar9f3xR7VDGHWNMsCRct3BxPFKhvqfAdjPKnk0BpECPz35xxyimZSw/BplUOZhgg5mGQgYhISDrIherM5x6PUiLFrB7nYXMV0hFT7NJrAR9DQNokSIq2owMpAYFTvs5VFgEMzPNNKOgsex+VsslbOPdt7QYy3KDrmPqusv6SmHHbhnbJEsuOr6kIEaon0fkBDwXVzTYjS7GngxGj+kfMzvxTYfODozcWXGWiha05pSPQ9Tr2jIA9yIhbGkkWgSH49QJ8jqeDnmQh0i9cE+ZARAoGBAO+PGhAN5jzJ9wps0HabFe1jrOXRE1mc8Za3+xqKRP7OfbxGOvnDFcgk6uB6SiEa8xSx8tf5QBnCOtku3krhD7BhoE2LDvxWXMLYvdFI3yz+LfBkvg00We+0i8aWPAk11xiqz9rEXlLFqxom30znGRlvpVK82TC15ubX3mDv13fjAoGBAOm4P3UUwCjAuzGj5d6vBgCik2MvRcvpSFsuhyIbd310K0NhjQhi7RW/MFkynHG/elh4yKL85aJmJdlvmXanh8EOe07Yg8zzghrsRMLWgA34z1zdJIPnbuwZWZLWAIDu9+qLVpCv+pPVE5J2m/0hyWt+5r4GG/rWIxFgluTuj7UZAoGBAIkFE8Ys/Qy2BCwdUxsT13Xhdio47NVr1C796o0imxYXK4m9rcvfzpycqQ9eQvoufOzQX3MyqHxTQO+qRBEWK7AaFuNjb13bU9FKwT9sa+JDPClspdvNnsdhQDWFBq/J8M62HI8nlD/JufUKWNyWrh+DYU8ynxOiZ4CP5i0R4e87AoGBAIOfS714Di/lOobeMpqSHuNEq5R0Du6jVihjr565sTVpsuOjkHVkoPhaT7QsGIbGuvQQMY34tqoatL4bZ2W3O3Cx4yeoL7HAgUkAPkkr27oCoWU+9U2DjKhSLmvPMUFrUxs3lWyuboPKv9cADSElYfWz5eamMiO1bNJgfxo2b6AhAoGBAMP36SEa/VCfC+c65T2UosccJcpSxfrUTOGhEykr5Y4nQnVdBBKR5g3JE/0cD9wo1Ti2nIsiK7c2b8AzeM4frRviXhL7NQoO4spb+ZD95wOrm8tjhPyOKhZwSoSqtq66iQj+btsrq0UzRujI1qkIV+fhdaCsn9sXzZKllJW5qjOb';
$aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2rWo9R9sZxEJ4/wSH3zvAeGZlrhGk4WWJv8+Mf+5emMn2K/SP18iZd9Hk9hMcSOkNp5sRa9A/nGI32It1wR0ExdVb7oQ3cuGyjAOUi01pXLIOefs32cvBbw3mE3mI1a0Sb42gbyj6KjcFxtUO3nziBMzHQlyRvr14Knithh+SpWaXfQd99J+DRxtZphinKBi+L75aeMv4Bz61jExOU7m4woNvQHJ59hs2ELIlk8kIp6yOvau6/Rxl2/xe6T+paImWVByQH9EY4PIvCJ0ipfvLdPleRwtdtYo0QLJnhg+WSYXWoYp+VhccTWYa/Yxh6QKe0cUE8Mm6MBmtVQHxZs0KwIDAQAB';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset='UTF-8';
$aop->format='json';
$request = new AlipayTradePagePayRequest ();
$request->setBizContent("{" .
    "\"out_trade_no\":\"20150320010101001\"," .
    "\"product_code\":\"FAST_INSTANT_TRADE_PAY\"," .
    "\"total_amount\":88.88," .
    "\"subject\":\"Iphone6 16G\"," .
    "\"body\":\"Iphone6 16G\"," .
    "\"time_expire\":\"2016-12-31 10:05:01\"," .
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
    "\"passback_params\":\"merchantBizType%3d3C%26merchantBizNo%3d2016010101111\"," .
    "\"extend_params\":{" .
    "\"sys_service_provider_id\":\"2088511833207846\"," .
    "\"hb_fq_num\":\"3\"," .
    "\"hb_fq_seller_percent\":\"100\"," .
    "\"industry_reflux_info\":\"{\\\\\\\"scene_code\\\\\\\":\\\\\\\"metro_tradeorder\\\\\\\",\\\\\\\"channel\\\\\\\":\\\\\\\"xxxx\\\\\\\",\\\\\\\"scene_data\\\\\\\":{\\\\\\\"asset_name\\\\\\\":\\\\\\\"ALIPAY\\\\\\\"}}\"," .
    "\"card_type\":\"S0JP0000\"" .
    "    }," .
    "\"goods_type\":\"0\"," .
    "\"timeout_express\":\"90m\"," .
    "\"promo_params\":\"{\\\"storeIdType\\\":\\\"1\\\"}\"," .
    "\"royalty_info\":{" .
    "\"royalty_type\":\"ROYALTY\"," .
    "        \"royalty_detail_infos\":[{" .
    "          \"serial_no\":1," .
    "\"trans_in_type\":\"userId\"," .
    "\"batch_no\":\"123\"," .
    "\"out_relation_id\":\"20131124001\"," .
    "\"trans_out_type\":\"userId\"," .
    "\"trans_out\":\"2088101126765726\"," .
    "\"trans_in\":\"2088101126708402\"," .
    "\"amount\":0.1," .
    "\"desc\":\"分账测试1\"," .
    "\"amount_percentage\":\"100\"" .
    "          }]" .
    "    }," .
    "\"sub_merchant\":{" .
    "\"merchant_id\":\"2088000603999128\"," .
    "\"merchant_type\":\"alipay: 支付宝分配的间连商户编号, merchant: 商户端的间连商户编号\"" .
    "    }," .
    "\"merchant_order_no\":\"20161008001\"," .
    "\"enable_pay_channels\":\"pcredit,moneyFund,debitCardExpress\"," .
    "\"store_id\":\"NJ_001\"," .
    "\"disable_pay_channels\":\"pcredit,moneyFund,debitCardExpress\"," .
    "\"qr_pay_mode\":\"1\"," .
    "\"qrcode_width\":100," .
    "\"settle_info\":{" .
    "        \"settle_detail_infos\":[{" .
    "          \"trans_in_type\":\"cardAliasNo\"," .
    "\"trans_in\":\"A0001\"," .
    "\"summary_dimension\":\"A0001\"," .
    "\"settle_entity_id\":\"2088xxxxx;ST_0001\"," .
    "\"settle_entity_type\":\"SecondMerchant、Store\"," .
    "\"amount\":0.1" .
    "          }]," .
    "\"settle_period_time\":\"7d\"" .
    "    }," .
    "\"invoice_info\":{" .
    "\"key_info\":{" .
    "\"is_support_invoice\":true," .
    "\"invoice_merchant_name\":\"ABC|003\"," .
    "\"tax_num\":\"1464888883494\"" .
    "      }," .
    "\"details\":\"[{\\\"code\\\":\\\"100294400\\\",\\\"name\\\":\\\"服饰\\\",\\\"num\\\":\\\"2\\\",\\\"sumPrice\\\":\\\"200.00\\\",\\\"taxRate\\\":\\\"6%\\\"}]\"" .
    "    }," .
    "\"agreement_sign_params\":{" .
    "\"personal_product_code\":\"GENERAL_WITHHOLDING_P\"," .
    "\"sign_scene\":\"INDUSTRY|CARRENTAL\"," .
    "\"external_agreement_no\":\"test\"," .
    "\"external_logon_id\":\"13852852877\"," .
    "\"sign_validity_period\":\"2m\"," .
    "\"third_party_type\":\"PARTNER\"," .
    "\"buckle_app_id\":\"1001164\"," .
    "\"buckle_merchant_id\":\"268820000000414397785\"," .
    "\"promo_params\":\"{\\\"key\\\",\\\"value\\\"}\"" .
    "    }," .
    "\"integration_type\":\"PCWEB\"," .
    "\"request_from_url\":\"https://\"," .
    "\"business_params\":\"{\\\"data\\\":\\\"123\\\"}\"," .
    "\"ext_user_info\":{" .
    "\"name\":\"李明\"," .
    "\"mobile\":\"16587658765\"," .
    "\"cert_type\":\"IDENTITY_CARD\"," .
    "\"cert_no\":\"362334768769238881\"," .
    "\"min_age\":\"18\"," .
    "\"fix_buyer\":\"F\"," .
    "\"need_check_info\":\"F\"" .
    "    }" .
    "  }");
$result = $aop->pageExecute ( $request);

$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
$resultCode = $result->$responseNode->code;
if(!empty($resultCode)&&$resultCode == 10000){
    echo "成功";
} else {
    echo "失败";
}