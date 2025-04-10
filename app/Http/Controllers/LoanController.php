<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return view('loan.index');
    }

    public function show($id)
    {
        // Retrieve loan details from the database using the $id
        // For now, we'll just return a view with a placeholder
        return view('loan.show', ['loan' => 'Loan details for ID: ' . $id]);
    }

    public function create()
    {
        return view('loan.create');
    }
}
