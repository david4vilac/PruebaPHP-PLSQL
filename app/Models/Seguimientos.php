<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateInterval;


class Seguimientos extends Model
{
    use HasFactory;
    function calcularFechaProximoSeguimiento($fechaActual, $diasHabiles) {
        $fechaActual = new DateTime($fechaActual);
        for ($i = 0; $i < $diasHabiles; $i++) {
            $fechaActual->add(new DateInterval('P1D'));
            // Verifica si el día actual es sábado (6) o domingo (7)
            while ($fechaActual->format('N') >= 6) {
                $fechaActual->add(new DateInterval('P1D'));
            }
        }
        return $fechaActual->format('d/m/Y');
    }
}
