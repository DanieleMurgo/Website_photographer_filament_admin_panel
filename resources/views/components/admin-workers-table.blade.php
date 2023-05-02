<!-- livewire create form -->

<div>
    <livewire:create-worker-form />
</div>



<!-- Workers table -->

<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Role</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($workers as $worker)
        <tr>
            <th scope="row">{{$worker->name}}</th>
            <td>{{$worker->surname}}</td>
            <td>{{$worker->role}}</td>
            <td class="d-flex">
<!-- delete worker component -->
                <x-modal-worker-delete workerId="{{$worker->id}}"/>

<!-- livewire worker component -->
                <livewire:edit-worker-form workerId="{{$worker->id}}"/>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>