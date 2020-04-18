@extends('layouts.app')

{{-- Note section--}}
@section('content')


        {{--Note section--}}

            <div class="card card-default">
                <div class="card-header"> {{ isset($note) ?'Edit Note' :'Create Note' }}
                </div>


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
                    <form action="{{ isset($note) ?route('note.update',$note->id) : route('note.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ( isset($note))
                            @method('PUT')
                        @endif
{{--                         Add Note --}}
                        <div class="form-group">
                            <label>Note Content</label>
                            <input type="text" id="noteContent" class="form-control" name="noteContent" value="{{ isset($note) ? $note->noteContent : " " }}">
                        </div>
{{--                        Add Quote--}}
                        <div class="form-group">
                            <label>Quote Content</label>
                            <input type="text" id="quote"  class="form-control" name="quote">

                        </div>
{{--                        Add Link--}}
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" id="link" class="form-control" name="link" >
                        </div>
{{--                        Add Image--}}
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" id="image" class="form-control" name="image" >
                        </div>
{{--                        Button--}}
                        <div class="form-group col text-center">
                            <button class="btn btn-success">
                                {{ isset($note)?"Update Record":"Add Record" }}
                            </button>
                        </div>
                    </form>
                </div>


        </div>



@endsection

