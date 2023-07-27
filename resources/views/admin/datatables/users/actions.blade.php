<style>
a {
    color: white;
}
a:hover {
    color: black;
}

tr {
    color: white;
}

th {
    color: black;
}
</style>


<a href='edit/user/{{ $id }}' class="link-warning"> <button>Edit User</button> </a>
@if (Auth::user()->email != $email)
    {{  Form::open(array('route' => array('users.destroy', $id), 'method' => 'post'))    }}
        {{  Form::token()   }}
        @method('delete')
            <div>
                <button type="submit"> Delete </button>
            </div>
    {{  Form::close() }}
@endif