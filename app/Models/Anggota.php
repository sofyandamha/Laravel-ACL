<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'komdas_id', 'nama', 'jabatan', 'alamat'
    ];
	
	public function get_komdas(){
    	return $this->belongsTo(Komdas::class, 'id');
    }
}