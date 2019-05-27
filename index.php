<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Smarter Click</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <img src="images/smarterlogo.png" alt="Logo">
            <div class="input-group">
                <input type="text" class="form-control search" placeholder="Search users by name:" aria-label="name" aria-describedby="search-name">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary reload" type="button">Reload Page</button>
                </div>
            </div>
            <div class="results-holder">
                <table class="table table-hover table-bordered results"></table>
            </div>
        </div>
    </div>

    <div id="logsModal" class="modal fade">  
        <div class="modal-dialog modal-lg">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <h4 class="modal-title">Log Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">
                    <table class="table table-hover table-bordered logs-table"></table>
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>
            </div>  
        </div>  
    </div>
</body>
</html>

