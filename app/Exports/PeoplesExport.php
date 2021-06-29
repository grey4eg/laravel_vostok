<?php

namespace App\Exports;

use App\Models\People;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeoplesExport implements FromCollection, WithHeadings, WithMapping
{

  // заголовки
  public function headings(): array
  {
    return [
      '#',
      'Фимилия',
      'Имя',
      'Отчество',
      'Долг',
      'Госпошлина',
      'Дата создания',
      'Дата обновления',
    ];
  }

  // форматирование даных
  public function map($invoice): array
  {

      return [
          $invoice->id,
          $invoice->Lastname,
          $invoice->FirstName,
          $invoice->Secondname,
          $invoice->Debt,
          $invoice->StateFee,
          date('d.m.Y H:i:s', strtotime($invoice->created_at)),
          date('d.m.Y H:i:s', strtotime($invoice->updated_at)),
      ];
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return People::all();
  }
}
