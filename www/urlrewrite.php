<?php
$arUrlRewrite=array (
  6 => 
  array (
    'CONDITION' => '#^/adress-book/([a-zA-Z0-9\\.\\-_]+)/?.*#',
    'RULE' => 'ELEMENT_ID=$1',
    'ID' => '',
    'PATH' => '/adress-book/detail.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/docs/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => '',
    'PATH' => '/docs/section.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);
