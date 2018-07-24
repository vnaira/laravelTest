@extends('layouts.app')

@section('content')
    <div class="col-md-12">
    <div class="row">

<div class="col-md-10">
    <form action="{{url('/insert_disc')}}" method="post">
        {{csrf_field()}}
        <fieldset>
            <legend>
                Add new disc
            </legend>
            @if(count($errors) > 0)
                @foreach($errors-> all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="form-group">
                <label for="" class="col-md-10 control-label">Disc Name</label>
                <div class="col-md-10">
                    <input type="text" name="disc_name" id="name" placeholder="Disc Name">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-10 control-label">Disc Author</label>
                <div class="col-md-10">
                    @if(count($singers) > 0)
                    <select name="disc_author" id="">
                        @foreach($singers as $singer)
                        <option value="{{$singer->id}}">
                            {{$singer->singer_name}}
                        </option>
                            @endforeach
                    </select>
                        @else
                        <p>There are no singers, please add the singer at first.</p>
                    @endif
                </div>
            </div>
        </fieldset>
        </br></br>
        <input type="submit" class="btn btn-primary" value="Submit">
        <input type="reset" class="btn btn-primary" value="Cancel">
    </form>
    <a href="{{url('/')}}" class="">Back to list</a>
</div>

    </div>
    </div>
@endsection