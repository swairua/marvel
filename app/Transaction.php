<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model

{
    use HasFactory;
    protected $table = 'transactions';
    protected $guarded = array();
}
