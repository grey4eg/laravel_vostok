<?php

namespace App\Exports;

use App\Models\People;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeoplesExport implements FromCollection, WithHeadings
{

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
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return People::all();
  }
}
