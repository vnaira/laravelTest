@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="row">
                <h3>Discs page</h3>

                @if( session('info') )
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif

                @if( count($singers)> 0 )
                    <table width="100%" class="table-bordered">
                        <tr>
                            <th class="text-center">Singer ID</th>
                            <th class="text-center">Singer Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>

                        @foreach( $singers-> all() as $singer )

                            <tr>
                                <td>{{$singer->id}}</td>
                                <td>{{$singer->singer_name}}</td>
                                <td>{{$singer->description}}</td>
                                <td class="text-center">
                                    <a href='{{url("/edit_singer/{$singer->id}")}}'
                                       class="btn btn-success btn-sm">Edit</a>
                                    |
                                    <a href='{{url("/delete_singer/{$singer->id}")}}'
                                       class="btn btn-danger btn-sm">Delete</a> |
                                    <a href='{{url("disc_list/{$singer->id}")}}' class="">Disc List</a>
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
                <a href="newsinger" class="new_btn">Create new item</a>
            </div>
        </div>
    </div>
@endsection