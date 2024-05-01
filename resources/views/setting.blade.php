<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Subscription Form Settings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Subscription Form Settings</h2>

    <form method="post" action="/savesettings">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="targeting_rule">Targeting Rule:</label>
            <select id="targeting_rule" name="targeting_rule" class="form-control">
                <option value="homepage">Show on homepage only</option>
            </select>
        </div>

        <div class="form-group">
            <label for="overlay_type">Overlay Type:</label>
            <select id="overlay_type" name="overlay_type" class="form-control">
                <option value="footer_slidein">Footer SlideIn</option>
                <option value="modal">Modal Overlay</option>
            </select>
        </div>

        <div class="form-group">
            <label for="display_rules">Display Rules:</label>
            <select id="display_rules" name="display_rules" class="form-control">
                <option value="once_per_day">Once per day</option>
                <option value="once_per_session">Once per session</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>