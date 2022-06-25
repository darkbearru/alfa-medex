<?php

namespace App\Models;

abstract class CatalogFilterType
{
    const String = 0;
    const Number = 1;
    const NumberRange = 2;
    const CheckBox = 3;
    const RadioBox = 4;
}
