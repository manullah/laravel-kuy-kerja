<div>
    <h1 class="my-6">Job Position</h1>

    <h4 class="mb-4 ">Create Job Position</h4>
    <div class="card w-1/2">
        <form action="#" method="POST" class="card-body">
            @csrf

            <div class="form-group">
                <x-jet-label for="name" value="{{ __('Name') }}" class="label" />
                <x-jet-input id="name" type="text" name="name" :value="old('name')" placeholder="Name..."
                    class="form-control" required autofocus />
            </div>
        </form>
        <div class="card-footer">
            <button class="button primary">Save</button>
        </div>
    </div>
</div>
