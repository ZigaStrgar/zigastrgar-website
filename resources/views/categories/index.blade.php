@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Categories'])
@endsection

@section('content')
    @if(count($categories->toArray()) > 0)
        <table class="table table-bordered table-condensed">
            <tr>
                <th>Name</th>
                <th>Count</th>
                <th>Actions</th>
            </tr>
            @each('categories.partials.category', $categories, 'category')
        </table>
    @else
        <h3 class="page-title text-center">Currently there aren't any categories added to the system</h3>
    @endif
    <h2 class="page-header">Add category</h2>
    {!! Form::open(['url' => 'categories']) !!}
    @include('categories.partials.form', ['submitText' => 'Add category', 'color' => 'success'])
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script>
        function deleteCategory(id) {
            $.ajax({
                url: 'categories/' + id,
                type: 'DELETE',
                data: {'_token': '{{ csrf_token() }}'},
                success: function (cb) {
                    $("tr[data-category=" + id + "]").remove();
                }
            });
        }
    </script>
@endsection