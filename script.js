    
    // Check if the info button (view logs) has been pressed
    // Direct to user_logs page using AJAX, set the id as a parameter to pass down
    // Display the results inside the modal

    $(document).on("click", ".info" ,function()
	    {
            var id = $(this).attr("id");
            $.ajax({
                url:"user_logs.php",
                method:"post",
                data:{
                    query : id
                },
                success:function(data)
                {
                    $(".logs-table").html(data);  
                    $("#logsModal").modal("show"); 
                }
            });
    });

    // Check if the delete button (delete user) has been pressed
    // Direct to delete page using AJAX, set the id as a parameter to pass down
    // Delete the user from the database and display an alert message

    $(document).on("click", ".delete" ,function()
	    {
            var confirmation = confirm("Are you sure you want to delete this user?");
            if (confirmation) {

                var id = $(this).attr("id");
                $.ajax({
                    url:"delete.php",
                    method:"post",
                    data:{
                        query : id
                    },
                    success:function()
                    {
                        alert("User has been deleted successfully");
                        location.reload();
                    }
                });
            
            }
            
    });
    
    // Reload the page

    $(document).on("click", ".reload" ,function()
	    {
            setTimeout(function(){
                location.reload();
            }, 850)
    });

    // Create a function to pass down the input of the search field 
    // Pass the variable using AJAX to the search page
    // display the results inside a table

    $(document).ready(function() 
        {
            search_user();
            function search_user(name) 
            {

                $.ajax({
                url: "search.php",
                method:"post",
                data:{
                    name : name
            },
                success:function(data) 
                {

                    $('.results').html(data);
                }
                });
            }

        $('.search').keyup(function()
        {
            var search = $(this).val();
            if(search != '')
            {
                search_user(search);
            }
            else
                {
                search_user();
            }
            });
       });
