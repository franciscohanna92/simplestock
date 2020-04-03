<?php
namespace App\View\Helper;

    use Cake\View\Helper;
use Cake\View\View;

/**
 * Roles helper
 */
class RolesHelper extends Helper
{
    private $roles = [
        "DEPOSITO" => "Encargado de depósito",
        "COMPRAS" => "Encargado de compras",
        "TECNICA" => "Encargado de área técnica",
        "ARTICULOS" => "Venta de artículos",
        "ADMIN" => "Administrador",
    ];

    public function allow($currentRole, $allowdRoles)
    {
        return in_array($currentRole, $allowdRoles);
    }

    public function deny($currentRole, $allowdRoles)
    {
        return !in_array($currentRole, $allowdRoles);
    }

    public function getRoleDisplayName($roleCode) {
        return $this->roles[$roleCode];
    }
}
