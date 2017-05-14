<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/4/16
 * Time: 16:54
 */
use think\Route;

// home 首页
//Route::get('/',function(){ return 'Hello,world!'; });
//Route::get('home/index/index','home/index/index');

// 记账
// 记账 首页
Route::get('ac','account/index/index');
// 记账 添加 页面
Route::get('ac/add','account/index/add');
Route::post('ac/add_handle','account/index/add_handle');
Route::get('ac/lst','account/index/lst');
