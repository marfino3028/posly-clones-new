<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ProductImport implements WithHeadingRow
{

    public function collection(Collection $rows)
    {
    }

    public function startRow(): int
    {
        return 2; // Adjust this according to your Excel file's structure.
    }

    public function registerEvents(): array
    {
        HeadingRowFormatter::default('none');

        return [
            BeforeImport::class => function (BeforeImport $event) {
                $mergeCells = $event->reader->getDelegate()->getActiveSheet()->getMergeCells();

                // $mergeCells is an array of merged cell ranges
                // You can process the merged cells here as needed.
            },
        ];
    }
}
