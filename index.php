<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .wrapper{
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row wrapper">
            <div class="col-xxl-6 mt-5">
                <h2 class="mb-3 bg-primary text-white p-3">Insert your Data</h2>
                    <form class="mainForm">
                        <div class="row">
                            <div class="col-xxl-6 mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" require>
                            </div>

                            <div class="col-xxl-6 mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" require>
                            </div>

                            <div class="col-xxl-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" require>
                            </div>

                            <div class="col-xxl-12 mb-3">
                                <button id="addData" type="submit" class="btn btn-primary" name="formSubmit">Submit</button>
                            </div>
                            
                        </div> 
                    </form>

            </div>


            <div class="col-xxl-12 mt-5">
                
            <h2 class="mb-3 bg-secondary text-white p-3">Result :</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Last</th>
                            <th scope="col">Email Address</th>
                        </tr>
                    </thead>
                    <tbody id="showData">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script>
        (function($){
            $(document).ready(function(){

                function dataShow(){
                    $.ajax({
                        "url": 'backend.php',
                        "success": function(result){
                            $("#showData").html(result);
                        }
                    });
                }
                dataShow();

                $("#addData").on("click",function(e){
                    // let params = {
                    //     "firstn": $("#fname").val(),
                    //     "ln": $("#lname").val(),
                    //     "mail": $("#email").val(),
                    //     "btn": $("#addData").val("formSubmit")
                    // }

                    var firstn = $("#fname").val();
                    var ln = $("#lname").val();
                    var mail = $("#email").val();

                    $.ajax({
                        type: 'POST',
                        url: 'backend.php',
                        data: {fname: firstn, lsname: ln, email:mail},
                        success: function(result){
                            if(result == 1){
                                dataShow();
                            }
                        }
                    }).done(function(msg){
                        $("#showData").html(msg);
                    })
                    $(".mainForm :input").val("");

                    return false;
                });
            });
        })(jQuery);
    </script>
</body>
</html>
