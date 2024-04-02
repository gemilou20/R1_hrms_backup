<?php

namespace App\Enums;

enum EventType: string
{
    case Birthdays = 'birthdays';
    case Anniversaries = 'anniversaries';
    case Meetings = 'meetings';
}
