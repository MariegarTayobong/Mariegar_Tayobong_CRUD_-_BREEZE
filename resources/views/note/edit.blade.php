<!-- resources/views/posts/edit.blade.php -->

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
        margin-bottom: 30px;
        color: #d63384;
    }

    .form-container {
        max-width: 700px;
        background: #fff;
        padding: 30px;
        margin: auto;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    .btn {
        background-color: #0d6efd;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 6px;
        cursor: pointer;
        display: inline-block;
        margin-top: 10px;
    }

    .btn:hover {
        background-color: #084298;
    }

    .alert {
        max-width: 700px;
        margin: 20px auto;
        background-color: #f8d7da;
        color: #842029;
        padding: 15px 20px;
        border-left: 6px solid #f5c2c7;
        border-radius: 6px;
    }
</style>

<h1>Edit Note</h1>

@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">
    <form action="{{ route('note.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <div>
            </div>
            <label for="title">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control" 
                value="{{ $post->title }}" 
                required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea 
                name="content" 
                id="content" 
                class="form-control" 
                rows="4" 
                required>{{ $post->content }}</textarea>
        </div>

                <div class="form-group">
            <label for="content">Description</label>
            <textarea 
                name="description" 
                id="content" 
                class="form-control" 
                rows="4" 
                required>{{ $post->description }}</textarea>
        </div>

        <button type="submit" class="btn">Update</button>
    </form>
</div>
