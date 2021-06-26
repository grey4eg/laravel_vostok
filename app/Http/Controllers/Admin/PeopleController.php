<?php

namespace App\Http\Controllers\Admin;

use App\Models\People;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\PeoplesExport;
use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade as PDF;


class PeopleController extends Controller
{

    public $coefficient = 0.1315789473684211; // коэффициент

    /* Список людей */
    public function index()
    {
        $peoples = DB::select('SELECT * FROM `peoples`');
        return view('admin.people.index', ['peoples' => $peoples]);
    }

    /* Форма создания новой записи в БД */
    public function create()
    {
        return view('admin.people.create');
    }

    /* Создание новой записи в бд */
    public function store (Request $request) {

      $data = $request->only(['Lastname', 'FirstName', 'Secondname', 'Debt']);

      $validated = $request->validate([
        'Lastname'   => ['required', 'string', 'max:64'],
        'FirstName'  => ['required', 'string', 'max:32'],
        'Secondname' => ['required', 'string', 'max:32'],
        'Debt'       => ['required', 'numeric', 'min:0'],
      ]);


      $state_fee = $this->getStateFee($data['Debt']);

      $people = People::create([
        'Lastname'   => $data['Lastname'],
        'FirstName'  => $data['FirstName'],
        'Secondname' => $data['Secondname'],
        'Debt'       => $data['Debt'],
        'StateFee'   => $state_fee,
      ]);

      if ( $people ) {
        return redirect(route('admin.people.index'));
      }

    }

    /* Расчет госпошлины */
    public function getStateFee ($debit) {
      return (int)$debit * $this->coefficient;
    }

    /* Импорт в Excel */
    public function export()
    {
        return Excel::download(new PeoplesExport, 'users.xlsx');
    }

    /* Отображение HTML документа по ссылке */
    public function show($id)
    {
      $people = DB::select('SELECT * FROM `peoples` WHERE `id` = ?', [ $id ]);
      return view('admin.people.show', ['people' => $people]);
    }

    /* Отображение PDF по прямой ссылке */
    public function getPdf ($id)
    {
      $people = DB::select('SELECT * FROM `peoples` WHERE `id` = ?', [ $id ]);
      $pdf = PDF::loadView('admin.people.show', ['people' => $people]);
      return $pdf->stream('user.pdf');
    }

    /* Скачивание PDF по ссылке */
    public function loadPdf ($id)
    {
      $people = DB::select('SELECT * FROM `peoples` WHERE `id` = ?', [ $id ]);
      $pdf = PDF::loadView('admin.people.show', ['people' => $people]);
      return $pdf->download('user.pdf');
    }

}
