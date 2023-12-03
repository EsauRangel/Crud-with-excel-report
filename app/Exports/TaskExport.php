<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class TaskExport
{
    private $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('logo');
        $drawing->setHeight(50);
        $drawing->setCoordinates('G1');

        return [$drawing];
    }

    public function view(): View
    {
        return view('exports.task_report', ["data" => $this->data]);
    }
}
