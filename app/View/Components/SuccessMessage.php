<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SuccessMessage extends Component
{
    public $message;
    public $formRecord;
    public $dataLink;
    public $dataText;
    public $dataLink1;
    public $dataText2;

    public function __construct($message, $formRecord = null, $dataLink = null, $dataText = null, $dataLink1 = null, $dataText2 = null)
    {
        $this->message = $message;
        $this->formRecord = $formRecord;
        $this->dataLink = $dataLink;
        $this->dataText = $dataText;
        $this->dataLink1 = $dataLink1;
        $this->dataText2 = $dataText2;
    }

    public function render()
    {
        return view('components.success-message');
    }
}
