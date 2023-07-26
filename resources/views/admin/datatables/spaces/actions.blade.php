<style>
#links a {
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
<div id="links">
     <a href='map/{{ $id }}' class="link-warning"> <button>Show on Map</button> </a>
    <a href='edit/space/{{ $id }}' class="link-warning"> <button>Edit Space</button> </a>
</div>
{{  Form::open(array('route' => array('spaces.destroy', $id), 'method' => 'post'))    }}
    {{  Form::token()   }}
    @method('delete')
        <div>
            <button type="submit"> Delete </button>
        </div>
{{  Form::close() }}

