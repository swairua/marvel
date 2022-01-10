<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::all();
    }

    public function headings(): array
    {
        return [
            'Invoioce Number',
            'Stock Code',
            'Description',
            'Quantity',
            'Invoice Date',
            'Unit Price',
            'Customer',
            'Country',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->InvoiceNo,
            'XXXXXXXXXXXX' . substr($transaction->StockCode, -4, 4),
            $transaction->Description,
            $transaction->Quantity,
            $transaction->InvoiceDate,
            $transaction->UnitPrice,
            $transaction->Customer,
            $transaction->Country,
        ];
    }
}
