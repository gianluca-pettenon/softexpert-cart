<?php

$this->get('/', 'Home@index');
$this->get('/admin', 'Admin@index');
$this->post('/product', 'Product@all');

