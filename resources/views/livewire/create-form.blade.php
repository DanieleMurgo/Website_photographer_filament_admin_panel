<div class="container">
    <form wire:submit.prevent="store">
        <div class="row ">

            <div class="mb-5 col-12 col-md-6">
                <label class="form-label fs-3 mt-3">Project name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5 col-12 col-md-6">
                <label class="form-label fs-3 mt-3">Client</label>
                <input type="text" class="form-control @error('client') is-invalid @enderror" wire:model="client">
                @error('client')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5 col-12 col-md-6">
                <label class="form-label fs-3 mt-3">Advertorial on</label>
                <input type="text" class="form-control @error('advertorialOn') is-invalid @enderror"
                    wire:model="advertorialOn">
                @error('advertorialOn')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5 col-12 col-md-6">
                <label class="form-label fs-3 mt-3">Year</label>
                <input type="number" step="1" class="form-control @error('year') is-invalid @enderror" wire:model="year"
                    placeholder="es. 2023">
                @error('year')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5 col-12 col-md-7">
                <label class="form-label fs-3">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" wire:model="description"
                    cols="30" rows="10"></textarea>
                @error('description')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Photo section -->
            <div class="col-12 col-md-7">
                <label class="form-label fs-3">Photos</label>
                <input name="images" type="file" multiple
                    class="form-control @error('temporary_images.*') is-invalid @enderror" wire:model="temporary_images"
                    placeholder="Img" />
                @error('temporary_images.*')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror

                @if(!empty($images))
                <div class="row">
                    <div class="col-12 mt-3">
                        <p>Photos:</p>
                        <div class="row border border-4 border-info rounded shadow py-2">
                            @foreach ($images as $key => $image)
                            <div class="col-12 col-md-4 my-3 d-flex justify-content-center flex-column">
                                <img alt="img-preview" class="create-img-dimension img-fluid mx-auto rounded"
                                    src="{{ $image->temporaryUrl() }}">
                                <button type="button" class="btn btn-danger shadow-lg d-block text-center mt-2 mx-auto"
                                    wire:click="removeImage( {{$key}} )">Delete</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>


        </div>
        <!-- fine row -->
        <button type="submit" class="btn button-28 mt-3">Save</button>
    </form>
    <!-- fine container -->
</div>