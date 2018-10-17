<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/inewsletter'], function (Router $router) {
    $router->bind('subscribers', function ($id) {
        return app('Modules\Inewsletter\Repositories\SubscribersRepository')->find($id);
    });
    $router->get('subscribers', [
        'as' => 'admin.inewsletter.subscribers.index',
        'uses' => 'SubscribersController@index',
        'middleware' => 'can:inewsletter.subscribers.index'
    ]);
    $router->get('subscribers/create', [
        'as' => 'admin.inewsletter.subscribers.create',
        'uses' => 'SubscribersController@create',
        'middleware' => 'can:inewsletter.subscribers.create'
    ]);
    $router->post('subscribers', [
        'as' => 'admin.inewsletter.subscribers.store',
        'uses' => 'SubscribersController@store',
        'middleware' => 'can:inewsletter.subscribers.create'
    ]);
    $router->get('subscribers/{subscribers}/edit', [
        'as' => 'admin.inewsletter.subscribers.edit',
        'uses' => 'SubscribersController@edit',
        'middleware' => 'can:inewsletter.subscribers.edit'
    ]);
    $router->put('subscribers/{subscribers}', [
        'as' => 'admin.inewsletter.subscribers.update',
        'uses' => 'SubscribersController@update',
        'middleware' => 'can:inewsletter.subscribers.edit'
    ]);
    $router->delete('subscribers/{subscribers}', [
        'as' => 'admin.inewsletter.subscribers.destroy',
        'uses' => 'SubscribersController@destroy',
        'middleware' => 'can:inewsletter.subscribers.destroy'
    ]);
// append

});
