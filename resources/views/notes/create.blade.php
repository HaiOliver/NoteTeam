@extends('layouts.app')

{{-- Note section--}}
@section('content')


        {{--Note section--}}

            <div class="card card-default">
                <div class="card-header"> Create Note </div>


                <div class="card-body">
{{--                    handle error--}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item text-danger">
                                        {{$error}}
                                    </li>
                                    @endforeach

                            </ul>

                        </div>

                        @endif
                    <form action="{{ route('note.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Note Content</label>
                            <input type="text" id="noteContent" class="form-control" name="noteContent" >
                        </div>
{{--                        Button--}}
                        <div class="form-group col text-center">
                            <button class="btn btn-success">Add Notes</button>
                        </div>
                    </form>
                </div>


        </div>



@endsection

