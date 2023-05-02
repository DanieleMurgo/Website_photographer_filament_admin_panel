<div>
    <!-- Create button -->
    <!-- create button trigger modal -->
    <button class="btn button-28 mt-3" data-bs-toggle="modal" data-bs-target="#createWorkerModal">New worker
        <i class="fa-solid fa-plus text-secondary"></i>
    </button>

    <!-- CreateModal -->
    <div class="modal fade" id="createWorkerModal" tabindex="-1" aria-labelledby="createWorkerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createWorkerModalLabel">New worker</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form wire:submit.prevent="store">
                    <div class="modal-body">

                        <div class="mt-2">
                            <label for="#new_worker_name">Name</label>
                            <input wire:model="name" id="new_worker_name" type="text" placeholder="Name"
                                class="form-control">
                        </div>


                        <div class="mt-2">
                            <label for="#new_worker_surname">Surname</label>
                            <input wire:model="surname" id="new_worker_surname" type="text" placeholder="Surname"
                                class="form-control">
                        </div>


                        <div class="mt-2">
                            <label for="#new_worker_role">Role</label>
                            <input wire:model="role" id="new_worker_role" type="text" placeholder="Role"
                                class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn button-b me-3" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn button-28" data-bs-dismiss="modal">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End CreateModal -->
</div>
