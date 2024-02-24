<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class OrdersExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths, WithEvents, WithTitle
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
            'B' => 5,
            'C' => 15,
            'D' => 15,
            'E' => 25,
            'F' => 50,
            'G' => 50,
            'H' => 20,
            'I' => 20,
            'J' => 60,
            'K' => 60,
            'L' => 60,
            'M' => 60,
            'N' => 1000,
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
        $headings = ['Sr no', 'Amount','Name','Phone', 'Email', 'Billing Address', 'Shipping Address', 'Shipping Name','Order ID','Product Name','Product Sku','Product Price','Product Quantity', 'Transaction Details'];

        return $headings;
    }

    public function map($taskQueuey): array
    {
        $row = [
            $taskQueuey->count ?? '',
            $taskQueuey->amount ?? '',
            $taskQueuey->name ?? '',
            $taskQueuey->phone ?? '',
            $taskQueuey->email ?? '',
            $taskQueuey->billing_address ?? '',
            $taskQueuey->shipping_address ?? $taskQueuey->billing_address,
            $taskQueuey->shipping_name ?? $taskQueuey->name,
            $taskQueuey->order_id ?? '',
            $taskQueuey->product_name ?? '',
            $taskQueuey->product_sku ?? '',
            $taskQueuey->product_price ?? '',
            $taskQueuey->product_qty ?? '',
            $taskQueuey->transaction_details ?? '',
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
