<?php

namespace App\Http\Traits\Livewire;

trait JobVacanciesSearchDropdownTrait
{
    public function chooseTypeOfWork($option)
    {
        $this->state['type_of_work'] = $option['id'];
        $this->stringSearchDropdown['type_of_work'] = $option['name'];

        $this->emit('emitSearchTypeOfWork', $option['name']);
    }

    public function changeTypeOfWork($value)
    {
        $this->state['type_of_work'] = null;
        $this->stringSearchDropdown['type_of_work'] = $value;
    }
}
