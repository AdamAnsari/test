<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\student;

class PdfController extends Controller
{
    //
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('users.dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('students')
         ->limit(10)
         ->get();
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="10%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Birthday</th>
    <th style="border: 1px solid; padding:12px;" width="20%">State</th>
    <th style="border: 1px solid; padding:12px;" width="20%">City</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Education</th>
    <th style="border: 1px solid; padding:12px;" width="20%">email</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Mobile</th>
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->birthday.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->state.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->city.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->education.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->mobile.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
