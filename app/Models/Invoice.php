<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'readeinvoice_hddt_purchase_trangthaidn';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nbmst',
        'nbten',
        'nbdchi',
        'nbstkhoan',
        'nbsdthoai',
        'nbdctdtu',
        'trangthai',
        'create_at',
        'create_by',
        'update_at',
        'update_by',
        'is_delete',
        'hddt_gov',
        'log',
    ];
    public $timestamps = false; // Không sử dụng timestamps
}
