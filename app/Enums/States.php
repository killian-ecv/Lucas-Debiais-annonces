<?php

namespace App\Enums;

enum States: string
{
    case NEUF = "Neuf";
    case COMMENEUF = "Comme neuf";
    case BON = "Bon";
    case USAGE = "Usagé";
    case DEFECTUEUX = "Défectueux";
    case PANNE = "En panne";
}
