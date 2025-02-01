<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('displayAll'); #default action
App::getRouter()->setLoginRoute('loginDisplay'); #action to forward if no permissions

Utils::addRoute('displayAll', 'ProductListCtrl');
Utils::addRoute('displayAll2', 'ProductListCtrl');
Utils::addRoute('loginDisplay', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('myProductList', 'ProductListCtrl');
Utils::addRoute('productEdit', 'ProductEditCtrl');
Utils::addRoute('productSave', 'ProductEditCtrl');
Utils::addRoute('showCart', 'CartCtrl');
Utils::addRoute('addToCart', 'CartCtrl');
Utils::addRoute('showSold', 'SoldCtrl');
Utils::addRoute('realiseOrder', 'SoldCtrl');




//Utils::addRoute('action_name', 'controller_class_name');