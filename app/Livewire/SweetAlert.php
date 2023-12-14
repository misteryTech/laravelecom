<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class SweetAlert extends Component
{

    public function render()
    {
        return view('livewire.sweet-alert');
    }


    public function save(){

        $this->dispatch('swal',
        ['title'=>'Success!',
        'text'=>'Data Save Cancel!',
        'icon'=>'success']);
    }

        #[On('goOn-Delete')]
    public function delete(){
        dd('deleting');
    }


}
