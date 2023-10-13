<?php

namespace App\Enums;

enum Deliveries: string
{
    case LIVRAISON = "Livraison";
    case DOMICILE = "En mains propre";
    case CLIENT = "Pas d'importance";
}
