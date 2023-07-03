<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ANIMAL_INFO extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'a_n_i_m_a_l__i_n_f_os';

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
                 'EXPORT_COUNTRY',
                  'ORIGIN_COUNTRY',
                  'TRANSIET_COUNTRY',
                  'ANML_SPECIES',
                  'ANML_SEX',
                  'ANML_NUMBER',
                  'ANML_USE',
                  'ANIMAL_BREED',
                  'client_id'
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
     * Get the client for this model.
     *
     * @return App\Models\Client
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }


    public function importaion()
    {
        return $this->belongsToMany(importation::class, 'importation_a_n_i_m_a_l__i_n_f_os', 'a_n_i_m_a_l__i_n_f_os_id', 'importation_id');
    }



}
