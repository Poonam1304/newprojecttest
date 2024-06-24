<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::whereNull('parent_id')->get();
    
        foreach ($employees as $employee) {
            $employee->hierarchy = $this->getChildren($employee);
        }
    
        return view('employees.index', compact('employees'));
    }
    
    protected function getChildren($employee)
    {
        $html = '';
        if ($employee->children->isNotEmpty()) {
            $html .= '<ul>';
            foreach ($employee->children as $child) {
                $html .= '<li>' . $child->name;
                $html .= $this->getChildren($child); 
                $html .= '</li>';
            }
            $html .= '</ul>';
        }
        return $html;
    }
}
