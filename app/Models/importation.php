<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class importation extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'importations';

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
                  'client_id',
                  'CER_TYPE',
                  'CER_LANG',
                  'COMP_ID',
                  'EUSER_QID',
                  'EXP_NAME',
                  'EXP_TEL',
                  'EXP_QID',
                  'EXP_FAX',
                  'EXP_COUNTRY',
                  'IMP_NAME',
                  'IMP_ADDRESS',
                  'IMP_FAX',
                  'IMP_TEL',
                  'IMP_POBOX',
                  'IMP_COUNTRY',
                  'ORIGIN_COUNTRY',
                  'SHIPPING_PLACE',
                  'ENTERY_PORT',
                  'EXPECTED_ARRIVAL_DATE',
                  'TRANSPORT',
                  'SHIPPING_DATE',
                  'APPLICANT_NAME',
                  'APPLICANT_TEL',
                  'EXP_NATIONALITY',
                  'EXP_PASSPORT_NUM',
                  'accepted',
                  'reson',
                  'files'
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

    /**
     * Get the cOMP for this model.
     *
     * @return App\Models\COMP
     */

    /**
     * Set the EXPECTED_ARRIVAL_DATE.
     *
     * @param  string  $value
     * @return void
     */


     public function animal()
     {
         return $this->belongsToMany(ANIMAL_INFO::class, 'importation_a_n_i_m_a_l__i_n_f_os', 'importation_id', 'a_n_i_m_a_l__i_n_f_os_id');
     }

}
