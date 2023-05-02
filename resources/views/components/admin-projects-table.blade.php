<a class="btn button-28 mt-3" href="{{Route('project.create')}}">New project
    <i class="fa-solid fa-plus text-secondary"></i></a>
<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Client</th>
            <th scope="col">Advertorial on</th>
            <th scope="col">Year</th>
            <th scope="col">Description</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <th scope="row">{{$project->name}}</th>
            <td>{{$project->client}}</td>
            <td>{{$project->advertorial_on}}</td>
            <td>{{$project->year}}</td>
            <td>{{substr($project->description, 0,40)}}...</td>
            <td class="d-flex">

                <!-- Button trigger modal delete -->
                <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#confirmDeleteProject-{{$project->id}}"
                    data-bs-placement="bottom" title="Delete">
                    <i class="fa-solid fa-trash-can text-white"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="confirmDeleteProject-{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="confirmDeleteProjectLabel-{{$project->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="confirmDeleteProjectLabel-{{$project->id}}">Click on
                                    'delete' to permanently delete the project
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                This action is permanent!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ Route('project.delete', $project) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
                <form action="{{Route('project.edit', $project)}}" method="get">
                    @csrf
                        <button type="submit" class="btn btn-secondary me-2" data-bs-placement="bottom" title="Edit">
                            <i class="fa-regular fa-pen-to-square text-white">
                            </i>
                        </button>
                </form>

                    <a type="button" class="btn btn-info" href="{{Route('project.show', $project)}}"><i
                            class="fa-solid fa-circle-info text-white" data-bs-placement="bottom" title="Info"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>