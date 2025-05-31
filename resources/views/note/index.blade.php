<!-- resources/views/posts/index.blade.php -->

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 20px;
        background: linear-gradient(to bottom, #ffb6d5, #ffc1e3, #fff0f5);
    }

    svg.w-5.h-5 {
        width: 50px;
        height: 50px;
    }


    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
        
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 10px 20px;
        border-radius: 5px;
        max-width: 350px;
        margin: 10px auto 25px auto;
        text-align: center;
    }

    table {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
        background: #ffffff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #dee2e6;
        text-align: left;
    }

    thead {
        background-color: #ff7aa7;
        color: white;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #e0f0ff;
    }

    .btn {
        padding: 6px 12px;
        margin-right: 5px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        display: inline-block;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btndanger {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .btndanger:hover {
        background-color: #b52a37;
    }

    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination .page-link {
        margin: 0 3px;
        padding: 6px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        color: #007bff;
        text-decoration: none;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .page-link:hover {
        background-color: #e0f0ff;

    }
    .header{
       width: 100%; display: flex; flex-direction: row; justify-content: space-between;
       align-items: center;
       padding-left: 80px;
       padding-right: 80px;
       box-sizing: border-box;
    }
    .header a {
        background-color: #007bff;
        padding: 10px;
        color: white;
        border: none;
        cursor: pointer;
        text-decoration: none;
        font-style: none;
        border-radius: 5px;
        border: 1px solid gray;
    }
    .header a:hover {
        background-color: blue;
    }
</style>

<div class="header">
    <h1>NOTE LIBRARY</h1>
    <a href="{{ route('note.create') }}">Add Note</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <a href="{{ route('note.show', $post) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('note.edit', $post) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('note.destroy', $post) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btndanger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $posts->links() }}
</div>
