<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileTracker extends Model
{
    protected $table = 'profile_tracker';

    public static function title_int_to_string(int $int_role) {

        $string_role=0;

        switch($int_role)    {
            case 1:
                $string_role = 'Cikgu';
                break;
            case 2:
                $string_role = 'Tuan';
                break;
            case 3:
                $string_role = 'Puan';
                break;
            case 4:
                $string_role = 'Mr';
                break;
            case 5:
                $string_role = 'Miss';
                break;
            case 6:
                $string_role = 'Bro';
                break;
            case 7:
                $string_role = 'Sis';
                break;
        }

        return $string_role;
    }

    public static function profile_mode_communication(int $int_mode)    {

        $string_mode = 0;

        switch($int_mode)    {
            case 1:
                $string_mode = 'Whatsapp';
                break;
            case 2:
                $string_mode = 'Call & SMS';
                break;
            case 3:
                $string_mode = 'Email';
                break;
        }

        return $string_mode;
    }
}
