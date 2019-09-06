<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
	
	
	protected $table = 'agenda';
	protected $fillable = ['nama_agenda', 'tanggal_mulai', 'durasi', 'lokasi', 'status', 'user_id'];




}
