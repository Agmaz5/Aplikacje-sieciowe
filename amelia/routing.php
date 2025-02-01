<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('displayAll'); 
App::getRouter()->setLoginRoute('loginDisplay'); 

Utils::addRoute('displayAll', 'ProductListCtrl');
Utils::addRoute('loginDisplay', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('myProductList', 'ProductListCtrl', ['creator']);
Utils::addRoute('newShow', 'ProductListCtrl', ['creator']);
Utils::addRoute('addProduct', 'ProductListCtrl', ['creator']);
Utils::addRoute('productEdit', 'ProductEditCtrl', ['creator']);
Utils::addRoute('productSave', 'ProductEditCtrl', ['creator']);
Utils::addRoute('showCart', 'CartCtrl', ['user', 'creator']);
Utils::addRoute('addToCart', 'CartCtrl');
Utils::addRoute('showSold', 'SoldCtrl', ['creator']);
Utils::addRoute('realiseOrder', 'SoldCtrl', ['creator']);
Utils::addRoute('controlPanel', 'AdminCtrl', ['admin']);
Utils::addRoute('userEdit', 'AdminCtrl', ['admin']);
Utils::addRoute('userSave', 'AdminCtrl', ['admin']);
Utils::addRoute('userDelete', 'AdminCtrl', ['admin']);
Utils::addRoute('addUser', 'AdminCtrl', ['admin']);
Utils::addRoute('addNewUser', 'AdminCtrl', ['admin']);
Utils::addRoute('productDelete', 'ProductListCtrl', ['creator']);


