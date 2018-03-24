<?php

namespace App\Providers;

//use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
            Pass City For Custom made dropdown plugin.
            Using View Composer
        */

        View::composer(['user.home','client.home','client.centerShow'],function ($view){
            $cities = array('Dhaka','Faridpur','Gazipur','Gopalgonj','Kishorganj','Madaripur','Manikganj','Munshiganj','Narayanganj','Narshingdi','Rajbari','Sariatpur','Tangail','Bandarban','Brahmanbaria','Chandpur','Chittagong','Comilla','Coxsbazar','Feni','Khagrachari','Laksmipur','Noakhali','Rangamati','Borguna','Barishal','Bhola','Jhalokathi','Patuakhali','Pirojpur','Bagerhat','Chuadanga','Jessore','Jhenadiah','Khulna','Kustia','Magura','Meherpur','Narail','Satkhira','Bogra','Jaipurhat','Naogaon','Nator','Chapainwabganj','Panba','Rajshahi','Sirajganj','Dinajpur','Gaibandha','Kurigram','Lalmanirhat','Nilfamari','Panchagar','Rangpur','Thakurgaon','Habihganj','Maulavibazar','Sunamganj','Sylhet','Jamalpur','Mymensing','Netrokona','Sherpur');
            sort($cities);
            $view->with('city',$cities);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
