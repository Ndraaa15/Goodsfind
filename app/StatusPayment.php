<?php

namespace App;

enum StatusPayment: string
{
    case PENDING = 'Pending';
    case PAID = 'Paid';
    case FAILED = 'Failed';
}
