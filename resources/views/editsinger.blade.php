@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/update_singer', array($singer->id))}}" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <legend>
                            Edit singer
                        </legend>
                        <div class="form-group">
                            @if(count($errors) > 0)
                                @foreach($errors-> all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <label for="" class="col-md-4 control-label">Singer Name</label>
                            <div class="col-md-8">
                                <input type="text" name="singer_name" id="name" placeholder="Singer Name"
                                       value="<?php echo $singer->singer_name; ?>">
                            </div>
                        </div>
                        <div class="form-group margin-top-40">
                            <label for="desc" class="col-md-4 control-label">Description</label>
                            <div class="col-md-8">
                    <textarea type="text" name="singer_desc" id="desc" class="form-control" placeholder="Description">
                   <?php echo $singer->description; ?>
                    </textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-md-6 col-md-offset-4 margin-top-40">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-primary" value="Cancel">
                    </div>
                </form>
                <a href="{{url('/singers')}}" class="col-md-12 margin-top-40">Back to list</a>
            </div>

        </div>
    </div>
@endsection