<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
        'id'=>'\d+',
        'cid'=>'\d+',
        'page'=>'\d+',
        'typename'=>'\w+',
        "site"=>'\d+',
        "urlprefix"=>'\w+',
        "urlpre_fix"=>'\w+',
        "industry_type_id"=>'\d+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    //index模块
    '$' => 'index/index/index',
//    'about$' => 'index/about/index',
//    'idea' => 'index/idea/index',
//    'services' => 'index/services/index',
//    'idea' => 'index/idea/index',
//    'contact$' => 'index/contact/index',
    "products/[:cid]$"=>"index/product/detail",
    ':url_prefix$'=>'index/page/detail',
];
