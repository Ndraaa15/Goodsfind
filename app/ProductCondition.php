<?php

namespace App;

enum ProductCondition: string
{
    case VERY_GOOD = 'Very Good';
    case GOOD = 'Good';
    case BAD = 'Bad';
    case VERY_BAD = 'Very Bad';
}
