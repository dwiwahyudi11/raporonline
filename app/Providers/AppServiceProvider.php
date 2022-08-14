<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use App\Models\Guru;
use App\Models\Siswa;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            //any code to set $val variable
            if(Auth::user() == null){
                //
            } else if(Auth::user()->hasRole('Guru')){
                $guru = Guru::where('id_users', Auth::user()->id)->first();
                $view->with('guru', $guru);
            } else if(Auth::user()->hasRole('Siswa')){
                $sis = Siswa::where('id_users', Auth::user()->id)->first();
                $view->with('sis', $sis);
            } else {
                //
            }
        });
    }
}
