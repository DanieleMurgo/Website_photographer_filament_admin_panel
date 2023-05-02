 <!-- Button trigger modal delete -->
 <span class="me-2" data-bs-placement="bottom" title="Delete">
                    <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                        data-bs-target="#deleteWorker-{{$workerId}}">
                        <i class="fa-solid fa-trash-can text-white"></i>
                    </button>
                </span>
                <!-- Modal -->
                <div class="modal fade" id="deleteWorker-{{$workerId}}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteWorkerLabel-{{$workerId}}"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteWorkerLabel-{{$workerId}}">Click on
                                    'delete' to permanently delete the worker
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                This action is permanent!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ Route('worker.delete', $workerId) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
