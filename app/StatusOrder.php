<?php

namespace App;

enum StatusOrder: string
{
    case PENDING = 'Pending';
    case ACCEPTED = 'Accepted';
    case REJECTED = 'Rejected';
}
