<?php

namespace App\Helpers;

class StatusMapper
{
    public static function mapPayPalStatus($paypalStatus)
    {
        switch ($paypalStatus) {
            case 'COMPLETED':
                return 'Pagado';
            case 'PENDING':
            case 'IN_PROGRESS':
                return 'En proceso';
            case 'FAILED':
            case 'DENIED':
                return 'Rechazado';
            default:
                return 'En proceso'; // Default to 'En proceso' if status is unknown
        }
    }
}
