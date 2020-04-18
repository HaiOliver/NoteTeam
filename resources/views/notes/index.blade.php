@extends('layouts.app')

{{-- Note section--}}
@section('content')

    <div class="row">
        {{--Note section--}}
        <div class="col-3">
            <div class="card card-default">
                <div class="card-header"> Note </div>
{{--                Load Note from DB--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table">--}}
{{--                        <tbody>--}}
{{--                            @foreach($notes as $note)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        {{$note->noteContent}}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                        </tbody>--}}

{{--                    </table>--}}
{{--                </div>--}}
{{--                add note btn--}}

                <div class="col text-center">
                    <a href="{{route('note.create')}}" class="btn btn-success">Add Note</a>

                </div>
            </div>

        </div>
        <div class="col-3">Quote</div>
        <div class="col-3">Images</div>
        <div class="col-3">TBD</div>
    </div>

@endsection
