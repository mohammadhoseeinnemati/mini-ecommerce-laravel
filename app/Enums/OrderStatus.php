<?php

namespace App\Enums;

enum OrderStatus : int
{
    case pending = 0;
    case processing  = 1;
    case sent = 2;
    case delivered  = 3;
    case cancelled = 4;
}
