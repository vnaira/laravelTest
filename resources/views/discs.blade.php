@extends('layouts.app')

@section('content')

    <h3>Discs page</h3>
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <div class="row">
        @if(isset($author))
			<?php echo '<h3>Discs list of '.$discs[ 0 ]->singer_name.'</h3>'; ?>
        @endif
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                @if(empty($discs))
                    <?php echo "kukukuu";?>
                @endif
                @if(count($discs)> 0)
                    <table width="100%" class="table-bordered">
                        <tr>
                            <th class="text-center">Disc name</th>
                            <th class="text-center">Disc author</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        @foreach($discs->all() as $disc )
                            <tr>
                                <td>{{$disc->disc_name}}</td>
                                <td>{{$disc->singer_name}}</td>
                                <td class="text-center">
                                    <a href='{{url("/edit_disc/{$disc->id}")}}' class="btn btn-success btn-sm">Edit</a>
                                    |
                                    <a href='{{url("/delete_disc/{$disc->id}")}}'
                                       class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <br>
                <a href="{{url('/newdisc')}}" class="new_btn">Create new disc</a>
            </div>
        </div>

    </div>
@endsection