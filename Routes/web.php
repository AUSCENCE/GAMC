<?php

use Gamc\Controller\HomeController;
use Gamc\Controller\NaissanceController;
use Gamc\Controller\PersonneController;
use Gamc\Controllers\arrondisementController;
use Gamc\Routes\Router;


Router::get('/', [HomeController::class,'home'])->name('home');

Router::get('/liste', [PersonneController::class,'index'])->name('liste');


Router::get('/arrondissement', [arrondisementController::class,'index'])->name('arrondissement.index');
Router::delete('/arrondissement', [arrondisementController::class,'delete'])->name('arrondissement.delete');
Router::post('/arrondissement', [arrondisementController::class,'store'])->name('arrondissement.store');
Router::put('/arrondissement', [arrondisementController::class,'update'])->name('arrondissement.update');

Router::get('/naissance', [NaissanceController::class,'index'])->name('naissance.index');
Router::get('/naissance/{id}', [NaissanceController::class,'show'])->name('naissance.show');
Router::get('/naissance/create', [NaissanceController::class,'create'])->name('naissance.create');
Router::post('/naissance', [NaissanceController::class,'store'])->name('naissance.store');


