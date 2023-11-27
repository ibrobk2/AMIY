<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Buying Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
    <!-- Jquery Ajax CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Select Your Data Plan</h2>

    <form method="post" action="">
        <div class="form-group">
            <label for="network">Select Network:</label>
            <select class="form-control" id="network" name="network">
                <option value="MTN">MTN</option>
                <option value="Glo">Glo</option>
                <option value="Airtel">Airtel</option>
                <option value="9Mobile">9Mobile</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dataType">Select Data Type:</label>
            <select class="form-control" id="dataType" name="dataType">
                <option value="">Select Data Type</option>
                <option value="SME">SME</option>
                <option value="CORPORATE">CORPORATE</option>
                <option value="GIFTING">GIFTING</option>
            </select>
        </div>

        <div class="form-group">
            <label for="plan">Select Plan:</label>
            <select class="form-control" id="plan" name="plan">
               <!-- to be fetch from database using Ajax call -->
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Select Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" readonly>
        </div>

        <button type="submit" class="btn btn-primary" name="buy-data">Buy Data</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<script>




// Fetching Data Plans from Database
$(document).ready(function(){
    $("#dataType").change(function(){
            var network = $("#network").val();
            var dataType = $(this).val();
            // alert(dataType);
        $.ajax({
            url: "fetch-data.php",
            type: "POST",
            data: {network:network, dataType:dataType},
            success: function(data){
                $("#plan").html(data);
            }
        });
    });


});


// Fetching Amount from Database Based on Data Plan
$(document).ready(function(){
    $("#plan").change(function(){
            // var network = $("#network").val();
            var plan_id = $(this).val();
            // alert(dataType);
        $.ajax({
            url: "fetch-amount.php",
            type: "POST",
            data: {plan_id:plan_id},
            success: function(data){
                $("#amount").val(data);
            }
        });
    });


});
</script>

</body>
</html>
