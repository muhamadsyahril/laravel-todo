@extends('layouts.default')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input id="todo" type="text" class="form-control" placeholder="Type in a new todo...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="add-todo">Add Todo</button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div id="data_todos">

            </div>
        </div>
    </div>

@stop

@section('myjs')
    <script src="js/default.js"></script>
@stop