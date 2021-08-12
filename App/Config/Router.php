<?php

$this->get('/', 'Home@index');
$this->get('/admin', 'Admin@index');

$this->post('/product', 'Product@all');
$this->post('/product/create', 'Product@all');

$this->post('/product/type', 'TypeProduct@getAll');
$this->post('/product/type/create', 'TypeProduct@create');

