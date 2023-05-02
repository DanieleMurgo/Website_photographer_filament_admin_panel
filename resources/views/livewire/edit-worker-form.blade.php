<div>
    <!-- Button trigger edit modal -->
    <span class="tt" data-bs-placement="bottom" title="Edit">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
        data-bs-target="#updateWorker-{{$workerId}}">
        <i class="fa-regular fa-pen-to-square text-white">
        </i>
    </button>
    </span>


    <!-- EditModal -->
    <div wire:ignore.self class="modal fade" id="updateWorker-{{$workerId}}" tabindex="-1"
        aria-labelledby="updateWorkerLabel-{{$workerId}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateWorkerLabel-{workerId}">Update worker
                        information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        <label for="#worker_name">Name</label>
                        <input wire:model="name" id="worker_name" type="text" class="form-control">
                        <label for="#worker_surname">Surname</label>
                        <input wire:model="surname" id="worker_surname" type="text" class="form-control">
                        <label for="#worker_role">Role</label>
                        <input wire:model="role" id="worker_role" type="text" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn button-b me-3" data-bs-dismiss="modal">Close</button>
                        <button id="editButton" type="submit"
                            class="btn button-28">Save
                            changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>