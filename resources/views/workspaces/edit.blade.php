    @extends('layouts.sidebar')
    @section('content')
    <div class="container-sm">
        <h3 class="mt-3">Edit Workspace</h3>
        <form action="{{ route('workspaces.update',[$workspace->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="" class="form-control" id="user_id" name="user_id" value="{{ $sessionId }}" hidden>
            <div class="mb-3">
              <label for="workspaceName" class="form-label">Workspace's Name</label>
              <input type="" class="form-control" id="workspaceName" name="workspaceName" >
            </div>

            <div class="mb-3">
              <label for="newName" class="form-label">Add member</label>
              <select class="form-control" id="newName" name="newName">
                <option value="" selected></option>
                @foreach ($user as $users )
                    <option value="{{ $users->id }}">{{ $users->email }}</option>
                @endforeach
              </select>
              <a href="javascript:void(0)" id="clearButton">y</a>
            </div>

            <div class="mb-3">
              <label for="workspaceDesc" class="form-label">Description</label>
              <textarea class="form-control" placeholder="" id="workspaceDesc" style="height: 100px" name="workspaceDesc"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route ('workspace') }}" type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</a>
          </form>
    </div>
    @endsection

    @push('scripts')
    <script type="module">
        // For Select2 4.1

        $("#newName").select2({
            theme: "bootstrap-5",
            placeholder: "New Member",
            // minimumInputLength: 1,
            // ajax: {
            //     url: "",
            //     dataType: 'json',
            //     delay: 250,
            //     data: function (params) {
            //         return {
            //             q: params.term // Gunakan 'q' sebagai parameter untuk input pencarian
            //         };
            //     },
            //     processResults: function (data) {
            //         return {
            //             results: data
            //         };
            //     },
            //     cache: true
            // }
        });

        $('#clearButton').click(function () {
            $('#newName').val(null).trigger('change');
        });
    </script>
    @endpush
