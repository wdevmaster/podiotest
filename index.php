<?php

require_once __DIR__.'/vendor/autoload.php';


function configure() {
    option('CLIENT_ID', 'testapi-5ytpjg'); // Replace with your client ID
    option('CLIENT_SECRET', '4OI4n2A3epG6Dt0omhXdvfU4hwfTgWSr03NhEwoQWHfntBZsu7Pdd4en2ggdCTwg'); // Replace with your client secret
    option('APP_ID', '24394441');
    option('APP_TOKEN', '87fdc56fc3a6461c81a5c8ce7d7274bc');
  
  
    layout('layout.php');
    error_layout('layout.php');
}

dispatch('/', 'items_create');
function items_create()
{
    return render('create.html.php', 'layout.php');
}

dispatch_post('/items/store', 'items_store');
function items_store()
{
    Podio::setup(option('CLIENT_ID'), option('CLIENT_SECRET'));

    try {
        Podio::authenticate_with_app(option('APP_ID'), option('APP_TOKEN'));
        
        $item = PodioItem::create(option('APP_ID'), ['fields' => [
            "nombre" => $_POST['firstname'],
            "apellido" => $_POST['lastname'],
            "email" => [
                'type' => 'home',
                'value' => $_POST['email']
            ],
            "edad" => $_POST['age'],
            "sexo" => $_POST['sex']
        ]]);
    
        if (isset($item->item_id)){
            flash('success', 'the item was created successfully');
            header('Location: '.'http://'.$_SERVER['HTTP_HOST']);
        }
    }
    catch (PodioError $e) {
        //var_dump($e->body['error_description']);
        flash('success', "The API responded with the error type <b>{$e->body['error']}</b> and the message ");
        header('Location: '.'http://'.$_SERVER['HTTP_HOST']);
    }
}

run();
