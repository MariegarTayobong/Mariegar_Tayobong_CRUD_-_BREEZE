<!-- resources/views/posts/create.blade.php -->

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 30px;
         background: linear-gradient(to bottom, #ffb6d5, #ffc1e3, #fff0f5);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
        padding: 15px 20px;
        border-radius: 5px;
        max-width: 600px;
        margin: 0 auto 25px auto;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #333;
    }

    input[type="text"], textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        font-family: inherit;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus, textarea:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
        .header{
       width: 100%; display: flex; flex-direction: row;;
       text-align: center;
       box-sizing: border-box;
       justify-content: center;
    }

</style>

<div class="header">
    <h1>New Note</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="formcontrol" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
    </div>
        <div class="form-group">
        <label for="content">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4"  style="height: 30px;"></textarea>
    </div>
    <div class="form-group">
        <label for="content">Note Cover Photo</label>
        <input type="file" name="photo" id="description" class="form-control" rows="4"  style="height: 30px;">
    </div>
    <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Create</button>
    <a href="{{ route('dashboard') }}" style="margin-top: 50px">Back
to all notes</a>
</form>
