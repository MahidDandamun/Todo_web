@extends('layouts.app')
   
@section('content')
<style>
    .cont{
        width:50vw;
        height:auto;
        margin:30px auto;
        
    }
</style>
<div class="cont">
    <div class="row jify-content-center">
        <div class="card p-0">
                <div class="card-header h2 text-center fw-bold">{{ __('Task') }}</div>
 
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end">
                            <a class="inner btn btn-link" href="{{route('todos.edit', $todo->id)}}">Edit</a>
                        </div>
                        <div class="my-3 text-start">
                            <b>Your Todo is: </b><span>{{$todo->title}}</span><br>
                            <b>Description: </b><span>{{$todo->description}}</span> 
                        </div>
                        
                        <div class="container-fluid d-flex justify-content-between p-0  ">
                            <a href="{{url()->previous()}}" class="btn btn-sm btn-primary">Back</a>
                            <form method="post" action="{{route('todos.destroy', $todo->id)}}" class="inner">
                                @csrf
                                @method('DELETE') 
                                <input type="hidden" name="todo_id" value="{{$todo->id}}">
                                <input type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmDelete" value="Delete">                                                     
                            </form>

                        </div>
                        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteLabel">Confirm Deletion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this record?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
     
        
    
    @endsection
    


