<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ExchangeRate;

class ExchangeRates extends Component
{
    public $currency_from, $currency_to, $rate, $exchangeRateId;
    public $updateMode = false;

    public function render()
    {
        return view('livewire.exchange-rates', [
            'exchangeRates' => ExchangeRate::all()
        ]);
    }

    private function resetInputFields()
    {
        $this->currency_from = '';
        $this->currency_to = '';
        $this->rate = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'currency_from' => 'required',
            'currency_to' => 'required',
            'rate' => 'required|numeric',
        ]);

        ExchangeRate::create($validatedData);

        session()->flash('message', 'Exchange Rate Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $exchangeRate = ExchangeRate::findOrFail($id);
        $this->exchangeRateId = $id;
        $this->currency_from = $exchangeRate->currency_from;
        $this->currency_to = $exchangeRate->currency_to;
        $this->rate = $exchangeRate->rate;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'currency_from' => 'required',
            'currency_to' => 'required',
            'rate' => 'required|numeric',
        ]);

        if ($this->exchangeRateId) {
            $exchangeRate = ExchangeRate::find($this->exchangeRateId);
            $exchangeRate->update($validatedData);

            $this->updateMode = false;

            session()->flash('message', 'Exchange Rate Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        if($id) {
            ExchangeRate::where('id', $id)->delete();
            session()->flash('message', 'Exchange Rate Deleted Successfully.');
        }
    }
}

