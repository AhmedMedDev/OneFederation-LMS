<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SegwitzCourseCertificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'certificate_code',
        'student_name',
        'type',
        'course_name',
        'trainer',
        'course_hours',
        'award_date',
    ];

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // protected $dateFormat = 'U';
        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'award_date' => 'date:Y-m-d',
    ];

    protected $dateFormat = 'Y-m-d';

    public function setDateAttribute( $value ) {
        $this->attributes['award_date'] = (new Carbon($value))->format('d/m/y');
      }
}
