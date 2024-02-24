<?php

namespace App\Exports;

use App\Models\backend\ProductSubcategory;
use App\Models\backend\Tags;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ProductsExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths, WithEvents, WithTitle
{
    protected $taskQueues;
    protected $timezone;
    protected $contact_level;

    public function __construct($taskQueues, $timezone = null, $contact_level = null)
    {
        // dd($taskQueues);
        $this->taskQueues = $taskQueues;
        $this->timezone = $timezone;
        $this->contact_level = $contact_level;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 50,
            'C' => 15,
            'D' => 10,
            'E' => 40,
            'F' => 10,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 20,
            'K' => 20,
            'L' => 20,
            'M' => 20,
            'N' => 20,
            'O' => 20,
            'P' => 20,
            'Q' => 20,
            'S' => 20,
            'T' => 20,
            'U' => 20,
            'V' => 20,
            'W' => 20,
            'X' => 20,
            'Y' => 20,
            'Z' => 20,
            'AA' => 20,
            'AB' => 20,
            'AC' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet
                    ->getStyle('A1:AC1')
                    ->applyFromArray([
                        'font' => ['bold' => true, 'size' => '12'],
                    ])
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);
                //$event->sheet->setAutoFilter('A1:K1');
                $event->sheet->getDelegate()->freezePane('A2');
            },
        ];
    }

    public function headings(): array
    {
        $headings = ['Sr no', 'Name', 'sku', 'Categories', 'Tags', 'Sale Price'];

        return $headings;
    }

    
    public function map($taskQueuey, $count = 0): array
    {
        $categories = ProductSubcategory::whereIn('id', json_decode($taskQueuey->product_subcategories, false))->pluck('name')->toArray();
        $tags = Tags::whereIn('id', json_decode($taskQueuey->tag_selection, false))->pluck('name')->toArray();

        $row = [
            $taskQueuey->count ?? '',
            $taskQueuey->name ?? '',
            $taskQueuey->sku ?? '',
            implode(',', $categories) ?? '',
            implode(',', $tags) ?? '',
            $taskQueuey->sale_price ?? '',
        ];
        return $row;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect($this->taskQueues);
    }

    public function title(): string
    {
        return 'Task Queue Report';
    }
}
