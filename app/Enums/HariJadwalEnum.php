<?php

namespace App\Enums;

enum HariJadwalEnum: string
{
    case HARI_SATU = 'Senin, Rabu, Jumat';
    case HARI_DUA = 'Selasa, Kamis, Sabtu';
    case HARI_TIGA = 'Setiap Hari';
}
