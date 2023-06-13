<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client  extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $hidden = ['password',  'remember_token'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'first_name',
                  'last_name',
                  'phone',
                  'email',
                  'ud',
                  'photo_ud_frent',
                  'photo_ud_back',
                  'password',
                  'contry_id',
                  'accepted',
                  'singateur',
                  'refused'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the contry for this model.
     *
     * @return App\Models\Contry
     */
    public function contry()
    {
        return $this->belongsTo('App\Models\countries','contry_id');
    }



}
