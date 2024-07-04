<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}
