@extends('layouts.adminapp')

@section('content')

<hr>


<div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <div class="card border-white">
                    <div class="card-body text-center border-white">
                        
                        
                        @if(Auth::guard('admin')->user()->ProfileImage)

                        <img class="rounded-circle img-fluid" src="/storage/ProfileImage/{{ Auth::guard('admin')->user()->ProfileImage }}" style="padding: 20px;">

                        @else
    
                        <img class="rounded-circle img-fluid border d-flex mx-auto" data-bs-hover-animate="pulse" src="/storage/ProfileImage/noimage.jpg" width="150px" height="150px">
    
                        @endif


                        <p class="card-text" style="font-size: 14px;">{{ Auth::guard('admin')->user()->name }}</p><a class="card-link" href="#" style="font-size: 14px;">Edit</a><a class="card-link" href="#" style="font-size: 14px;">Delete</a></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 text-center align-self-center">
                <div class="row">
                    <div class="col-md-3" style="padding: 5px;">
                        <div class="form-check">

                            <input name="option" class="form-check-input" type="radio" id="formCheck-4" onclick = "checkfunc(0)" checked>
                            <label class="form-check-label" for="formCheck-4">Users</label>

                        </div>
                    </div>
                    <div class="col-md-3" style="padding: 5px;">
                        <div class="form-check">
                            <input name="option" class="form-check-input" type="radio" id="formCheck-4" onclick = "checkfunc(1)">
                            <label class="form-check-label" for="formCheck-4">Advertisements</label>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding: 5px;">
                        <div class="form-check">
                            <input  name="option" class="form-check-input" type="radio" id="formCheck-4" onclick = "checkfunc(2)">
                            <label class="form-check-label" for="formCheck-4">Question Bank</label>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding: 5px;">
                        <div class="form-check">
                            <input name="option" class="form-check-input" type="radio" id="formCheck-4" onclick = "checkfunc(3)">
                            <label class="form-check-label" for="formCheck-4">Past Papers</label>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding: 5px;">
                        <div class="form-check">
                            <input name="option" class="form-check-input" type="radio" id="formCheck-4" onclick = "checkfunc(4)">
                            <label class="form-check-label" for="formCheck-4">Comments</label>
                        </div>
                    </div>
                </div>

                <!--For display error message or success messages-->
                @include('inc.messages')

                <div class="row">


                    <div class="col" style="margin: 15px 0px;">

                        <!--users table-->
                        <div id="tableUsers" class="table-responsive" style="display: block">
                            <h3>Users</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($data['users']  as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                
                                        <td>    
                                            {!!Form::open(['action' => ['AdminUserController@destroy',$user->id], 'method' => 'POST' ]) !!}

                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Remove',['class' => 'btn btn-danger btn-sm'])}}
                                        
                                            {!!Form::close() !!}
                                        </td>
                                       
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!--End of users table-->
                        
                        <!--Advertisement table-->
                        <div id="tableAdvertisement" class="table-responsive" style="display: none">
                            <h3>Advertisements</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ad ID</th>
                                        <th>fullName</th>
                                        <th>subject</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['advertisements']  as $advertisement)
                                    <tr>
                                        <td>{{$advertisement->id}}</td>
                                        <td>{{$advertisement->fullName}}</td>
                                        <td>{{$advertisement->subject}}</td>
                                        <td>          
                                            <a href="/adminPost/{{$advertisement->id}}/edit">
                                                <button class="btn btn-info btn-sm" type="button">Edit</button>
                                            </a>
                                        </td>
                                        <td>       
                                            {!!Form::open(['action' => ['AdminPostsController@destroy',$advertisement->id], 'method' => 'POST' ]) !!}

                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Remove',['class' => 'btn btn-danger btn-sm '])}}
                                        
                                            {!!Form::close() !!}
                                        </td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                        <!--End of Advertisement table-->


                        <!--Question Bank table-->

                        <div id="tableQuestionBank" class="table-responsive" style="display: none">
                            <h3>Question Bank</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>subject</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($data['questionBanks']  as $question)
                                    <tr>
                                        <td>{{$question->id}}</td>
                                        <td>{{$question->title}}</td>
                                        <td>{{$question->subject}}</td>
                                        <td>
                                            <a class="card-link" href="/adminQuestionBank/{{$question->id}}/edit">
                                                <button class="btn btn-info btn-sm">Edit</button>
                                            </a>
                                        </td>
                                        <td>     
                                            {!!Form::open(['action' => ['AdminQuestionBankController@destroy',$question->id], 'method' => 'POST' ]) !!}

                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Remove',['class' => 'btn btn-danger btn-sm'])}}
                                        
                                            {!!Form::close() !!}
                                        </td>
                                       
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <!--End of Question Bank table-->

                        <!-- Comments table-->
                        <div id="tableComments" class="table-responsive" style="display: none">
                        
                             <h3>Comments</h3>
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>ID</th>
                                         <th>Comment By</th>
                                         <th>Commented Question</th>
                                         <th>Comment</th>
                                         <th>Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($data['comments']  as $comment)
                                     <tr>
                                         <td>{{$comment->id}}</td>
                                         <td>{{$comment->commenter_id}}</td>
                                         <td>{{$comment->commentable_type}} {{$comment->commentable_id}}</td>
                                         <td>{!!$comment->comment!!}</td>
                                         <td>     
                                            {!!Form::open(['action' => ['AdminCommentController@destroy',$comment->id], 'method' => 'POST' ]) !!}

                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Remove',['class' => 'btn btn-danger btn-sm'])}}
                                        
                                            {!!Form::close() !!}
                                         </td>
                                        
                                     </tr>
                                 @endforeach
                                 </tbody>
                             </table>
                         </div>
 
                         <!--End of Comments table -->


                        <!-- Past papers table-->
                        <div id="tablePastpapers" class="table-responsive" style="display: none">
                           <a class="nav-link" href="/pastpapers/create"><button class="btn btn-success btn-sm"> Create a PastPaper</button></a>
                            <h3>Past papers</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Year</th>
                                        <th>Grade</th>
                                        <th>Subject</th>
                                        <th>Term</th>
                                        <th>School</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['pastpapers']  as $pastpaper)
                                    <tr>
                                        <td>{{$pastpaper->id}}</td>
                                        <td>{{$pastpaper->year}}</td>
                                        <td>{{$pastpaper->grade}}</td>
                                        <td>{{$pastpaper->subject}}</td>
                                        <td>{{$pastpaper->term}}</td>
                                        <td>{{$pastpaper->school}}</td>
                                        <td>
                                            <a class="card-link" href="/pastpapers/{{$pastpaper->id}}/edit">
                                                <button class="btn btn-info btn-sm">Edit</button>
                                            </a>
                                        </td>
                                        <td>     
                                            {!!Form::open(['action' => ['PastPapersController@destroy',$pastpaper->id], 'method' => 'POST' ]) !!}

                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Remove',['class' => 'btn btn-danger btn-sm'])}}
                                        
                                            {!!Form::close() !!}
                                        </td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!--End of Past papers table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<script>
    //java scipt for show and hide alsubject list and olsubject list
    function checkfunc(x)
    {
        if( x == 0)
        {
            document.getElementById("tableUsers").style.display = 'block';
            document.getElementById("tableAdvertisement").style.display = 'none';
            document.getElementById("tableQuestionBank").style.display = 'none';
            document.getElementById("tablePastpapers").style.display = 'none';
            document.getElementById("tableComments").style.display = 'none';
        }
        if (x == 1)
        {
            document.getElementById("tableUsers").style.display = 'none';
            document.getElementById("tableAdvertisement").style.display = 'block';
            document.getElementById("tableQuestionBank").style.display = 'none';
            document.getElementById("tablePastpapers").style.display = 'none';
            document.getElementById("tableComments").style.display = 'none';
        }
        if (x == 2)
        {
            document.getElementById("tableUsers").style.display = 'none';
            document.getElementById("tableAdvertisement").style.display = 'none';
            document.getElementById("tableQuestionBank").style.display = 'block';
            document.getElementById("tablePastpapers").style.display = 'none';
            document.getElementById("tableComments").style.display = 'none';
        }
        if (x == 3)
        {
            document.getElementById("tableUsers").style.display = 'none';
            document.getElementById("tableAdvertisement").style.display = 'none';
            document.getElementById("tableQuestionBank").style.display = 'none';
            document.getElementById("tablePastpapers").style.display = 'block';
        }
        if (x == 4)
        {
            document.getElementById("tableUsers").style.display = 'none';
            document.getElementById("tableAdvertisement").style.display = 'none';
            document.getElementById("tableQuestionBank").style.display = 'none';
            document.getElementById("tablePastpapers").style.display = 'none';
            document.getElementById("tableComments").style.display = 'block';
        }
    }
    
</script>