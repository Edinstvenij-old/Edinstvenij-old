<form>
    <div class="form-group">
        <label for="currency_from">Currency From:</label>
        <input type="text" class="form-control" id="currency_from" wire:model="currency_from">
        @error('currency_from') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="currency_to">Currency To:</label>
        <input type="text" class="form-control" id="currency_to" wire:model="currency_to">
        @error('currency_to') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="rate">Rate:</label>
        <input type="text" class="form-control" id="rate" wire:model="rate">
        @error('rate') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
