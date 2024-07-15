<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>No.</th>
            <th>Currency From</th>
            <th>Currency To</th>
            <th>Rate</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exchangeRates as $exchangeRate)
            <tr>
                <td>{{ $exchangeRate->id }}</td>
                <td>{{ $exchangeRate->currency_from }}</td>
                <td>{{ $exchangeRate->currency_to }}</td>
                <td>{{ $exchangeRate->rate }}</td>
                <td>
                    <button wire:click="edit({{ $exchangeRate->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $exchangeRate->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

