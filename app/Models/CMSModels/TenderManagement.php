<?php

namespace App\Models\CMSModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderManagement extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $primaryKey = 'uid';

    protected $table = 'tender_management';	

}
