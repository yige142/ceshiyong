<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016073100136265",

		//商户私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEA2rWo9R9sZxEJ4/wSH3zvAeGZlrhGk4WWJv8+Mf+5emMn2K/SP18iZd9Hk9hMcSOkNp5sRa9A/nGI32It1wR0ExdVb7oQ3cuGyjAOUi01pXLIOefs32cvBbw3mE3mI1a0Sb42gbyj6KjcFxtUO3nziBMzHQlyRvr14Knithh+SpWaXfQd99J+DRxtZphinKBi+L75aeMv4Bz61jExOU7m4woNvQHJ59hs2ELIlk8kIp6yOvau6/Rxl2/xe6T+paImWVByQH9EY4PIvCJ0ipfvLdPleRwtdtYo0QLJnhg+WSYXWoYp+VhccTWYa/Yxh6QKe0cUE8Mm6MBmtVQHxZs0KwIDAQABAoIBAQC4TZtKrSdRl0cpaxLum/5hLHacTz+SM2F8DV2hDqmDnClI7akUJBw9krGjwgNw2CMar9f3xR7VDGHWNMsCRct3BxPFKhvqfAdjPKnk0BpECPz35xxyimZSw/BplUOZhgg5mGQgYhISDrIherM5x6PUiLFrB7nYXMV0hFT7NJrAR9DQNokSIq2owMpAYFTvs5VFgEMzPNNKOgsex+VsslbOPdt7QYy3KDrmPqusv6SmHHbhnbJEsuOr6kIEaon0fkBDwXVzTYjS7GngxGj+kfMzvxTYfODozcWXGWiha05pSPQ9Tr2jIA9yIhbGkkWgSH49QJ8jqeDnmQh0i9cE+ZARAoGBAO+PGhAN5jzJ9wps0HabFe1jrOXRE1mc8Za3+xqKRP7OfbxGOvnDFcgk6uB6SiEa8xSx8tf5QBnCOtku3krhD7BhoE2LDvxWXMLYvdFI3yz+LfBkvg00We+0i8aWPAk11xiqz9rEXlLFqxom30znGRlvpVK82TC15ubX3mDv13fjAoGBAOm4P3UUwCjAuzGj5d6vBgCik2MvRcvpSFsuhyIbd310K0NhjQhi7RW/MFkynHG/elh4yKL85aJmJdlvmXanh8EOe07Yg8zzghrsRMLWgA34z1zdJIPnbuwZWZLWAIDu9+qLVpCv+pPVE5J2m/0hyWt+5r4GG/rWIxFgluTuj7UZAoGBAIkFE8Ys/Qy2BCwdUxsT13Xhdio47NVr1C796o0imxYXK4m9rcvfzpycqQ9eQvoufOzQX3MyqHxTQO+qRBEWK7AaFuNjb13bU9FKwT9sa+JDPClspdvNnsdhQDWFBq/J8M62HI8nlD/JufUKWNyWrh+DYU8ynxOiZ4CP5i0R4e87AoGBAIOfS714Di/lOobeMpqSHuNEq5R0Du6jVihjr565sTVpsuOjkHVkoPhaT7QsGIbGuvQQMY34tqoatL4bZ2W3O3Cx4yeoL7HAgUkAPkkr27oCoWU+9U2DjKhSLmvPMUFrUxs3lWyuboPKv9cADSElYfWz5eamMiO1bNJgfxo2b6AhAoGBAMP36SEa/VCfC+c65T2UosccJcpSxfrUTOGhEykr5Y4nQnVdBBKR5g3JE/0cD9wo1Ti2nIsiK7c2b8AzeM4frRviXhL7NQoO4spb+ZD95wOrm8tjhPyOKhZwSoSqtq66iQj+btsrq0UzRujI1qkIV+fhdaCsn9sXzZKllJW5qjOb",
		
		//异步通知地址
		'notify_url' => "http://www.yige142.cn/alipay_sd/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.yige142.cn/alipay_sd/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAp5NmVEHz9wirLDGc4bSOJp7rt/Ve7iiTJri5T4z/JVlh46MdjWj6GSdECaxkk27iA1y+igEtnMOVWu+ZSOUAlTA8+bWXj3FEU71GqwL+5O55R+FUea4GbV2q0gpNaxi1WknhKkxAaLbMSdd3ltyh8FnK8mfQ8HpTPFg+kx0jhBC836Cm6dVkpKauw3/DIeYXc1vG5NuImY58N7RLtjyr+AaYhbp/sj7fCk6puuhtwdU8rceCwSa8uLS0E5r40tRyiXjcjhwAUqM2Lsdshe+i+u/Fj/H+kkl/DyYUex+Rnp7cI+2qAJNvLgBU3yA1w/w51Fo8UCXSbt5KX2F/mOfnGQIDAQAB",
);