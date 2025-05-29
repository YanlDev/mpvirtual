<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * 🎯 MÉTODO PRINCIPAL: Redirige según el rol del usuario
     * 
     * Este es el controlador más importante porque:
     * - Define el flujo de navegación principal
     * - Separa la lógica según roles
     * - Proporciona datos específicos para cada dashboard
     */

    public function index(){
        $user = Auth::user(); // Obtiene el usuario autenticado actualmente

        // 🔍 DECISIÓN BASADA EN ROLES

        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard'); // Redirige al dashboard del administrador
            case 'employee':
                return $this->employeeDashboard(); // Llama al método para el dashboard del empleado
            case 'user':
                return redirect()->route('user.dashboard'); // Redirige al dashboard del usuario
                break;
            default:
                Auth::logout(); // Si el rol no es válido, cierra la sesión
                return redirect()->route('login')->
                withErrors(['error' => 'Rol de usuario no valido.']); // Redirige a la página de inicio de sesión con un mensaje de error
        }
    }

    // protected function adminDashboard(){
    //     // Lógica específica para el dashboard del administrador
    //     return view('admin.dashboard'); // Redirige a la vista del dashboard del administrador
    // }

    protected function employeeDashboard(){
        // Lógica específica para el dashboard del empleado
        return view('employee.dashboard'); // Redirige a la vista del dashboard del empleado
    }
    // protected function userDashboard(){
    //     // Lógica específica para el dashboard del usuario
    //     return view('user.dashboard'); // Redirige a la vista del dashboard del usuario
    // }

}
