<?php

namespace App\Modules\Config\Faqs;

use App\Modules\ModelBase;

class Faq extends ModelBase
{
    protected $fillable = ['question', 'answer'];
}
