<?php

namespace App\Imports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Transaction([
            'InvoiceNo'     => $row[0],
            'StockCode'    => $row[1], 
            'Description'    => $row[2], 
            'Quantity'    => $row[3], 
            'InvoiceDate'    => $row[4], 
            'UnitPrice'    => $row[5],
            'Customer'    => $row[6], 
            'Country'    => $row[7],  
        ]);
    }
}
