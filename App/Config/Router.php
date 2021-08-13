<?php

$this->get('/', 'Home@index');

$this->get('/admin', 'Admin@index');

$this->post('/product', 'Product@getAll');
$this->post('/product/create', 'Product@create');

$this->post('/product/type', 'TypeProduct@getAll');
$this->post('/product/type/create', 'TypeProduct@create');

