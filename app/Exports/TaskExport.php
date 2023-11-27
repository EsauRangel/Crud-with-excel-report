<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

class TaskExport
{
    private $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // public function view(): View
    // {
    //     return view('');
    //     // return view('exports.task_report', ['data' => $this->data]);
    // }
}
