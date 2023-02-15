<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;


    class Event extends Model{
        protected $table    = 'events';
        public $timestamps  = false;

        public function artist(){
            return $this->hasOne(Artist::class,'id','artist_id');
        }

        public function host(){
            return $this->hasOne(Host::class,'id','host_id');
        }

        public function venue(){
            return $this->hasOne(Venue::class,'id','venue_id');
        }

        public function format(){
            return $this->hasOne(EventFormat::class,'id','format_id');
        }
    }    