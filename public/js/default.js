$(function(){

    var base_url = 'http://localhost:8000';
    var $idTodos  = $('#data_todos');

    if( $(this).val().length === 0 ) {
        $('#add-todo').attr('disabled', 'disabled');
    }

    $('#todo').blur(function()
    {
        if( $(this).val().length === 0 ) {
            $('#add-todo').attr('disabled', 'disabled');
        } else {
            $('#add-todo').removeAttr('disabled');
        }
    });

    $('#add-todo').on('click', function (e) {
        e.preventDefault();
        var title = $('#todo').val();
        var todo = {
            'title': title
        };
        postJquery('/todo/create', todo);
        clear();
    });


    getTodos();

    function deleteTodo(id) {
        var params = {
            'id' : id
        };
        postJquery('/todo/deleted', params);
    }

    function completeTodo(id, completed) {
        var params = {
            'id' : id,
            'completed' : completed
        };
        postJquery('/todo/completed', params);
    }

    function clear() {
        $('#todo').val("");
        $('#add-todo').attr('disabled', 'disabled');
    }

    function getTodos() {
        jQuery.ajax({
            url: base_url + '/todo/list',
            type: 'GET',
            data: {

            },
            success: function (todos) {
                addTodosHtml(todos);
            }
        });
    };

    function postJquery(endpoint, params) {
        jQuery.ajax({
            url: base_url + endpoint,
            type: 'POST',
            data: params,
            success: function (todos) {
                addTodosHtml(todos);
            }
        });
    }

    function addTodosHtml(todos) {
        $idTodos.empty();
        $idTodos.append(todos).on('click', '.check-todo', function () {
            var id = $(this).data("id");
            var completed = this.checked;
            completeTodo(id, completed);
        }).on('click', '.del-todo', function () {
            var id = $(this).data("id");
            deleteTodo(id);
        });
    }

});