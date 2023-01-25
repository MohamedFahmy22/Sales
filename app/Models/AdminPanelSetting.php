<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPanelSetting extends Model
{
    use HasFactory;

    protected $table = 'admin_panel_settings';
    protected $fillable = ['system_name', 'photo', 'active', 'generl_alert', 'address', 'phone', 'added_by', 'updated_by', 'company_code', 'created_at', 'updated_at'];
}
