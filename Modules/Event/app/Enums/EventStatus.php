<?php

namespace Duobix\Event\Enums;

enum EventStatus: string
{
    case Active = 'Active';
    case Completed = 'Completed';
    case Canceled = 'Canceled';
    case Draft = 'Draft';
}
