<?php

namespace App\Enums;

enum Trades: string
{
    case NEGOCIATION = "Négociation";
    case ECHANGE = "Échange";
    case DEUX = "Les deux";
    case NON = "Non";
}
