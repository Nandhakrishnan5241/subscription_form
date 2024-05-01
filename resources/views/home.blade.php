<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Email Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        footer {
            background-color: #ccc;
            color: #000;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #email {
            padding: 10px;
            width: 500px;
            margin-bottom: 10px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Adjust the height as needed */
        }

        .center {
            text-align: center;
            font-size: 30px
        }
    </style>
</head>

<body>
    <header>
        <h3>{{ $displayData[0]->titles }}</h3>
    </header>

    @if ($displayData[0]->overlaytypes == 'modal')
        <div id="overlay" class="overlay">
            <div class="overlay-content modal-content">
                <form class="overlayForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3 pt-3 pl-39px fs-6"><label for="email">Enter your Email ID :</label>
                            </div>
                            <div class="col-9"><input type="email" id="email" name="email" required>
                                <span class="close-btn" onclick="closeOverlay()">&times;</span><br>
                                <span class="error-msg" style="display:none; color:red"></span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button><br>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="container">
        <strong class="center">
            <span class="success-msg" style="display:none; color:green;"></span>
        </strong>
    </div>

    @if ($displayData[0]->overlaytypes == 'footer_slidein')
        <footer>
            <div id="overlay" class="overlay footer-slidein-overlay">
                <div class="overlay-content footer-slidein-content">
                    <form class="overlayForm">
                        @csrf
                        <label for="email">Enter your email:</label>
                        <input type="email" id="email" name="email" required>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <span class="close-btn" onclick="closeOverlay()">&times;</span><br>
                        <span class="error-msg" style="display:none; color:red;"></span>

                    </form>

                </div>
            </div>
        </footer>
    @endif

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        var jsArray = @json($displayData);
        console.log("data", jsArray);
    </script>
</body>

</html>
