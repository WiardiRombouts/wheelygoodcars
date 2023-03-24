<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use Illuminate\Support\Carbon;
class SalesStatus extends Component
{
    
    public $car;
    
    // echo $mytime->toDateTimeString();

    public function render()
    {
        return view('livewire.sales-status', ['cars' => $this->car]);
    }

    public function toggle()
    {
        $now = date('Y-m-d H:i:s');

        if($this->car->sold_at == NULL)
        {
            $this->car->sold_at = $now;
        }
        else{
            $this->car->sold_at = NULL;
        }
        $this->car->save();
    }
}