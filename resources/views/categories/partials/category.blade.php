<tr data-category="{{ $category->id }}">
    <td>{{ $category->name }}</td>
    <td>{{ count($category->skills->toArray()) }}</td>
    <td>
        <a href="{{ action('CategoriesController@edit', $category->id) }}">Edit</a>
        <a class="pointer" onClick="deleteCategory({{ $category->id }});">Delete</a>
    </td>
</tr>