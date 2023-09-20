@extends('layouts.app')
@section('styles')
<style>
    
    #outer{
        width:auto;
        text-align:center;


    }
    .inner{
        display: inline-block;
    }
    .btn{
        cursor:pointer;
    }

</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h2 text-center fw-bold">{{ __('TASKS') }}</div>

                <div class="card-body">
                @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                         {{Session::get('alert-success')}}
                    </div>
                @endif
                @if(Session::has('alert-done'))
                    <div class="alert alert-dark" role="alert">
                         {{Session::get('alert-success')}}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                         {{Session::get('error')}}
                    </div>
                @endif
                 
         
                <a type="button" class="btn btn-labeled btn-primary" href="{{route('todos.create')}}"></span>Add New Task</span></a>
                @if(count($todos) > 0)                 
                    <table class="table mt-3">
                        <thead>
                            <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    <td>                                        
                                        @if ($todo->is_completed == 1)
                                         <p><del><strong>{{$todo->title}}</strong></del></p>        
                                         @elseif($todo->is_completed == 0)                                        
                                         <strong>{{$todo->title}}</strong> 
                                         @else                                        
                                         <strong>{{$todo->title}}</strong>                                                                                             
                                        @endif  
                                    </td>
                                    <td>
                                        @if ($todo->is_completed == 1)
                                         <p><del>{{$todo->description}}</del></p>        
                                         @elseif($todo->is_completed == 0)                                        
                                         <p>{{$todo->description}}</p>        
                                         @else                                        
                                         <p>{{$todo->description}}</p>                                                                                               
                                        @endif                                                                      
                                        
                                    </td>
                                    <td>                                  
                                        @if ($todo->is_completed == 1)
                                            <a class="btn btn-sm btn-success " href="">Completed</a>
                                        @elseif($todo->is_completed == 0)                                        
                                            <a class="btn btn-sm btn-warning " href="">In progress</a>
                                        @else                                        
                                            <a class="btn btn-sm btn-danger " href="">Haven't started yet</a>
                                            
                                        @endif                                                                      
                                    </td>
                                    <td id="outer">                                           
                                        <a class="inner btn btn-sm btn-outline-info" href="{{ route('todos.show', $todo->id)}}">Change</a>
 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

    
                    </table>
                @else
                <h4 class="mt-3">No tasks right now</h4>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
