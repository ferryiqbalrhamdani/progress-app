<?php

namespace App\Livewire\Data\Project;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DetailStep extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.data.project.detail-step');
    }
}
