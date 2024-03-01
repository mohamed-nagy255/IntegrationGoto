<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Integration Test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary m-4" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Meeting
                </button>
                <div class="p-6 text-gray-900">
                    <center>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">subject</th>
                                    <th scope="col">description</th>
                                    <th scope="col">startTime</th>
                                    <th scope="col">endTime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 0)
                                @foreach ($webinars as $row)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        {{-- <td>{{ $row->subject }}</td> --}}
                                        {{-- <td>{{ $row->description }}</td> --}}
                                        {{-- <td>{{ $row->startTime }}</td> --}}
                                        {{-- <td>{{ $row->endTime }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.webinar') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="startTime" class="form-label">Start Time</label>
                            <input type="datetime-local" name="startTime" class="form-control" id="startTime"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="endTime" class="form-label">End Time</label>
                            <input type="datetime-local" name="endTime" class="form-control" id="endTime"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
