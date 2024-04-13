<?php

namespace App;

enum StatusPayment: string
{
    case PENDING = 'Pending';
    case SUCCESS = 'Paid';
    case FAILED = 'Failed';
}
