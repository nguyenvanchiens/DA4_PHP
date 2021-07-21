<?php

return[
    [
        'name'=>'DashBoard',
        'icon'=>'fa-home',
        'route'=>'admin'
    ],[
        'name'=>'Danh sách',
        'icon'=>'fa-home',
        'route'=>'admin',
        'items'=>[
            'name'=>'Danh sách loại sản phẩm',
            'icon'=>'',
            'route'=>'admin/category'
        ],[
            'name'=>'Danh sách sản phẩm',
            'icon'=>'',
            'route'=>'admin/product'
        ]
    ]
]

?>