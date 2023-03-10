<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 9 Ajax Autocomplete Search from Database Example - NiceSnippets.com</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h5>Laravel 9 Ajax Autocomplete Search from Database Example - NiceSnippets.com</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                                </div>
                                <div id="product_list"></div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script type="text/javascript">
        $(document).ready(function(){
            var typingTimer; 
            $('#name').on('keyup',function () {
                var query = $(this).val();
                clearTimeout(typingTimer);
                typingTimer = setTimeout(function() {
                    $.ajax({
                        url:'{{ route('search') }}',
                        type:'GET',
                        data:{'name':query},
                        success:function (data) {
                            $('#product_list').html(data);
                        }
                    })
                }, 1000); 
            });
            $(document).on('click', 'li', function(){
                var value = $(this).text();
                $('#name').val(value);
                $('#product_list').html("");
            });

            // initiate a click function on each search result
            $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).data();
                    // assign the value to the search box
                    console.log(value);
                });
        });
    </script>   
</body>
</html>