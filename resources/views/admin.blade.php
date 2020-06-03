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
                </div>


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
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                    </tr>
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
                                        <th>level</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                    </tr>
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
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!--End of Question Bank table-->

                        <!-- Past papers table-->
                        <div id="tablePastpapers" class="table-responsive" style="display: none">
                            <h3>Past papers</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 1</td>
                                    </tr>
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
        }
        if (x == 1)
        {
            document.getElementById("tableUsers").style.display = 'none';
            document.getElementById("tableAdvertisement").style.display = 'block';
            document.getElementById("tableQuestionBank").style.display = 'none';
            document.getElementById("tablePastpapers").style.display = 'none';
        }
        if (x == 2)
        {
            document.getElementById("tableUsers").style.display = 'none';
            document.getElementById("tableAdvertisement").style.display = 'none';
            document.getElementById("tableQuestionBank").style.display = 'block';
            document.getElementById("tablePastpapers").style.display = 'none';
        }
        if (x == 3)
        {
            document.getElementById("tableUsers").style.display = 'none';
            document.getElementById("tableAdvertisement").style.display = 'none';
            document.getElementById("tableQuestionBank").style.display = 'none';
            document.getElementById("tablePastpapers").style.display = 'block';
        }
    }
    
</script>