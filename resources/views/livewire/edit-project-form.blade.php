<form wire:submit.prevent="edit">
    @csrf
    <div class="container">
        <div class="row">
            @foreach($project->photos as $photo)
            <div class="col-12 col-md-2" wire:key="$photo->id">
                <div class="card">
                    <img src="{{Storage::url($photo->thumb_path)}}" class="img-fluid image-dimension" />
                    <div class="card-body d-flex justify-content-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#confirm-delete-{{$photo->id}}">
                            <i class="fa-solid fa-trash-can text-white"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirm-delete-{{$photo->id}}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title fs-5" id="staticBackdropLabel">Click on
                                            'delete' to permanently delete the photo
                                        </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        This action is permanent!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button wire:click="destroyPhoto({{$photo}})"
                                            class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Collapse for details -->

            <div class="card card-body">
                <div class="col-12 col-md-6">
                    <div class="mb-5">
                        <label class="form-label fs-3 mt-3">Titolo del progetto</label>
                        <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label fs-3 mt-3">Cliente</label>
                        <input wire:model="client" type="text"
                            class="form-control @error('client') is-invalid @enderror">
                        @error('client')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label fs-3 mt-3">Inserzione su</label>
                        <input wire:model="advertorial_on" type="text"
                            class="form-control @error('advertorialOn') is-invalid @enderror">
                        @error('advertorialOn')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label fs-3 mt-3">Anno</label>
                        <input wire:model="year" type="number" step="1"
                            class="form-control @error('year') is-invalid @enderror" placeholder="es. 2023">
                        @error('year')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label fs-3">Descrizione</label>
                        <textarea wire:model="description"
                            class="form-control @error('description') is-invalid @enderror" cols="30"
                            rows="10"></textarea>
                        @error('description')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- fine row -->
        </div>
        <button type="submit" class="btn btn-dark mt-3">Submit</button>
        <!-- fine container -->
    </div>
</form>