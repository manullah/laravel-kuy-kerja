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

    public function chooseWorkExperience($option)
    {
        $this->state['work_experience'] = $option['id'];
        $this->stringSearchDropdown['work_experience'] = $option['name'];

        $this->emit('emitSearchWorkExperience', $option['name']);
    }

    public function changeWorkExperience($value)
    {
        $this->state['work_experience'] = null;
        $this->stringSearchDropdown['work_experience'] = $value;
    }

    public function chooseJobPosition($option)
    {
        $this->state['job_position'] = $option['id'];
        $this->stringSearchDropdown['job_position'] = $option['name'];

        $this->emit('emitSearchJobPosition', $option['name']);
    }

    public function changeJobPosition($value)
    {
        $this->state['job_position'] = null;
        $this->stringSearchDropdown['job_position'] = $value;
    }
}
