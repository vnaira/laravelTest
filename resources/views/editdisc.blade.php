@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-10">
                @if(count($disc)>0 )
                    <form action="{{url('/update_disc', array($disc[0]->id))}}" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <legend>
                                Edit disc
                            </legend>
                            @if(count($errors) > 0)
                                @foreach($errors-> all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Disc Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="disc_name" id="name"
                                           value="<?php echo $disc[ 0 ]->disc_name;?>">
                                </div>
                            </div>

                            <div class="form-group margin-top-40">
                                <label for="" class="col-md-3 control-label">Disc Author</label>
                                <div class="col-md-8">
                                    @if(count($singers) > 0)
                                        <select name="disc_author">
                                            @foreach($singers as $singer)
                                                <option value="<?php echo $singer->id?>" <?php if( $singer->id == $disc[ 0 ]->singer_id )
													echo "selected";?>>
													<?php echo $singer->singer_name;?>
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
                @else
                    <div class="alert">
                        An error occurred, please connect with admin!
                    </div>
                @endif
                <div class="col-md-12">
                    <a href="{{url('/discs')}}" class="margin-top-40">Back to list</a>
                </div>
            </div>

        </div>
    </div>
@endsection