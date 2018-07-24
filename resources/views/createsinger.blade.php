@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <form action="{{url('/insert')}}" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <legend>
                            Add new singer
                        </legend>
                        <div class="form-group col-md-12">
                            @if(count($errors) > 0)
                                @foreach($errors-> all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <label for="" class="col-md-2 control-label">Singer Name</label>
                            <div class="col-md-10">
                                <input type="text" name="singer_name" id="name" placeholder="Singer Name">
                            </div>
                        </div>
                        <div class="col-md-12 margin-top-40">
                            <label for="desc" class="col-md-2 control-label">Description</label>
                            <div class="col-md-10">
                    <textarea type="text" name="singer_desc" id="desc" class="form-control" placeholder="Description">
                    </textarea>
                            </div>
                        </div>
                        <div class="col-md-12 margin-top-40">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-primary" value="Cancel">
                        </div>
                    </fieldset>
                </form>
                <a href="{{url('/singers')}}" class="margin-top-40 col-md-6">Back to list</a>
            </div>
        </div>
    </div>
@endsection