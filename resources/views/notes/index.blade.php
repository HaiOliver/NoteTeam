@extends('layouts.app')

{{-- Note section--}}
@section('content')

    <div class="row">
        {{--Note section--}}
        <div class="col-3">
            <div class="card card-default">
                <div class="card-header"> Note </div>
{{--                Load Note from DB--}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th> Note Content</th>
                            <th></th>
                        </thead>
                        <tbody>
{{--                            @foreach($notes as $note)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        {{$note->noteContent}}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('note.edit',$note->id ) }}" class="btn btn-info btn-sm">Edit</a>--}}
{{--                                        <a href="" onclick="handleDelete({{$note->id}})" class=" btn btn-danger btn-sm"  >Delete</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
                        </tbody>

                    </table>
{{--                    Modal--}}
                    <div class="modal" id="deleteModal" aria-labelledby="deleteModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST" id="deleteNoteForm">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Note</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure to delete it?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Ok, Delete it</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
{{--                add note btn--}}

                <div class="col text-center">
                    <a href="{{ route('note.create')}}" class="btn btn-success">Add Note</a>

                </div>

            </div>

        </div>
{{--        Quote section--}}
{{--        <div class="col-3">--}}

{{--            <div class="card card-default">--}}
{{--                <div class="card-header"> Quote </div>--}}
{{--                --}}{{--                Load Note from DB--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <th> Quote Content</th>--}}
{{--                        <th></th>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($quotes as $quote)--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    {{$quote->quoteContent}}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ route('quote.edit',$quote->id ) }}" class="btn btn-info btn-sm">Edit</a>--}}
{{--                                    <a href="" onclick="handleDelete({{$quote->id}})" class=" btn btn-danger btn-sm"  >Delete</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}

{{--                    </table>--}}
{{--                    --}}{{--                    Modal--}}

{{--                --}}{{--                add note btn--}}

{{--                <div class="col text-center">--}}
{{--                    <a href="{{ route('quote.create')}}" class="btn btn-success">Add Quote</a>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-3">Images</div>--}}
{{--        <div class="col-3">TBD</div>--}}
{{--    </div>--}}

@endsection

@section('script')

    <script >

        function handleDelete(id){
            let form = document.getElementById('deleteNoteForm');
            form.action = '/note/'+id;
            console.log("form:"+ form.action);
            $('#deleteModal').modal("show");
            console.log("delete btn work: "+id);

        }

    </script>


    @endsection
