<x-layout>
    <x-slot name="title">Login</x-slot>
    <section>
        <div class="container mt-nav header-min-height">
            <h2 class="text-center">Login</h2>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                            @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn button-28">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</x-layout>