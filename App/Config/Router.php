<?php

$this->get('/', 'Home@index');

$this->get('/admin', 'Admin@index');

$this->post('/product', 'Product@getAll');
$this->post('/product/create', 'Product@create');

$this->post('/type-product', 'TypeProduct@getAll');
$this->post('/type-product/create', 'TypeProduct@create');

