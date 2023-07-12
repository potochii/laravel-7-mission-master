@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mb-2 text-right">
                @if (session()->has('save_status'))
                <div class="alert alert-{{ session()->get('save_status')['status'] }}">
                    {{ session()->get('save_status')['message'] }}
                </div>
                @endif
                @php   $userID = Auth::user()->id; @endphp
                <a class="btn btn-success" href="{{ route('topics.create') }}">New Topic</a>
            </div>
            <table class="table table-bordered bg-white table-hover">
                <thead>
                    <tr>
                       
                        <th>no.</th>
                        <th></th>
                        <th>ID</th>
                        <th>Topic</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Comment</th>
                    </tr>
                   
                </thead>
                <tbody> @php($j=0) 
                    @forelse ($topics as $topic)
                        @php($j++)
                    <tr>
                        <td>{{$j}}</td>
                      
                        <td></td>
                        <td>{{ $topic->id }}</td>
                        <td>
                            <a href="{{ route('topics.edit', $topic->id) }}">{{ $topic->title }}</a>
                        </td>
                        <td>{{ $topic->user->name }}</td>
                        <td>{{ $topic->created_at }}</td>
                        @php($i=0)
                        @foreach ($ments as $row)
                            
                        @if($topic->id==$row->topic_id)  
                        
                        @php($i++)
                        @endif
                       
                        @endforeach
                        <td>{{$i}}</td>
                        
                       
                    </tr>

                    <tr>
                        <th></th>
                        <th>Comments </th>
                      
                   
                       
                         <td>
                         @foreach ($ments as $row)
                        
                            
                         @if($topic->id==$row->topic_id)   
                         {{$row->user->name}} {{$row->created_at}}  
                      

                         @if($userID==$row->user_id)
                         <a style="color:Tomato;"href="{{ url('delete/'.$row->id)}}">delete</a>
                        @endif
                         <br>
                             {{$row->comment}}
                              <br>
                              <br>
                        @endif
                     
                          @endforeach
                     </td>
                     </tr>
                     
                    
                    @empty
                    <tr>
                        <td colspan="5">No topic found</td>
                    </tr>
                    @endforelse

                     
        </div>
    </div>
</div>
@endsection
