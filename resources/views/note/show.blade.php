<!-- resources/views/posts/show.blade.php -->

<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom right, #ffe6f0, #ffffff);
        margin: 40px;
        color: #333;
    }

    h1 {
        text-align: center;
        font-size: 2.2rem;
        margin-bottom: 20px;
        color: #d63384;
    }

    .post-container {
        background: #fff;
        padding: 30px;
        max-width: 700px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    p {
        font-size: 1.1rem;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .actions {
        margin-top: 20px;
        text-align: center;
    }

    .btn {
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        display: inline-block;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #0d6efd;
        color: white;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>

<h1 style="color: gray">VIEW NOTE</h1>
<div class="post-container">
    <img src="{{ asset('storage/uploads/' . $post->photo) }}" alt="Photo" style="width: 50%; height: 50%;">

    <h1>{{ $post->title }}</h1>
    <p><strong>Content:</strong> {{ $post->content }}</p>
    <p><strong>Description:</strong> {{ $post->description }}</p>

    <div class="actions">
        <a href="{{ route('note.edit', $post) }}" class="btn btn-secondary">Edit</a>

        <form action="{{ route('note.destroy', $post) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>

        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to all notes</a>
    </div>
</div>
