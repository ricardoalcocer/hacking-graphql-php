<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Venue extends Model{
        protected $table    = 'venues';
        public $timestamps  = false;

        public function host(){
            return $this->hasOne(Host::class,'id','host_id');
        }
    }    