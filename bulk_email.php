<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=0.6" rel="stylesheet">
        <style>
            .table{
                width:70%;
            }
            .msg_container {
                position: fixed;
                width:40%;
                right: 0;
                bottom: 0;
                background: #f7efef;
                padding: 15px;
                border-radius: 2px;   
                color: #000;
                box-shadow: -2px -5px 20px 0px #00000040;
            }
            .msg_container h4{
                margin-top: 0;

            }
        </style>
    </head>
    <body>

<!-- Nnvbar Starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="wel_admin.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer_list.php">Customer List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="submitted_prob.php">Submitted Problems</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="offer_post.php">Post Offers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="enter_potentials.php">Potential customer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="bulk_email.php">Send bulk email</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a></a>
    </li>
  </ul>
  
</div>
</nav>
<!-- Navbar ends -->


        <?php
        include 'config.php';
        include 'vendor/autoload.php';
        
        $sql = "SELECT * FROM `potential_customer`";
        $users = mysqli_query($conn, $sql);
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="mcheck"> Check All
                    </th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="alluser">
                <?php
                if (mysqli_num_rows($users) > 0) { 
                    while($row = mysqli_fetch_assoc($users)) {
                       echo "<tr>";
                       echo "<td>";
                       echo "<input type='checkbox' value='$row[pot_c_email]' onclick='checkEmail()' >";
                       echo "</td>";
                       echo "<td>";
                       echo $row['name'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['pot_c_email'];
                       echo "</td>";
                       echo "</tr>";
                       
                }
            }
            else{
                echo "0 users";
            }
                ?>
            </tbody>
        </table>
        
        <form action="" method="post" class="msg_container">
            <h4>Compose Email</h4>
            <p id="multi-responce"></p>
            <div class="form-group">
                <textarea class="form-control" id="emails" name="emails" placeholder="Email list" style="height: 120px;"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
                <textarea style="height: 220px;" id="message" name="message" class="form-control" placeholder="Your Message" rows="5" required></textarea>
            </div>
            <button type="button" onclick="multi_email();" class="btn btn-primary btn-lg col-lg-12" id="send">Send Now </button>

        </form>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="main.js" type="text/javascript"></script>
        
        <script>
//this function pushes checked emails into email list        
        function checkEmail() {
            var allVals = [];
            $('#alluser tr td :checked').each(function() {
            allVals.push($(this).val());
            });
            $('#emails').val(allVals);
        }
//this function calls checkEmail when element with id=mcheck is clicked
        $(function() {
            $('#mcheck').click(checkEmail);
            checkEmail();
        });
        </script>
    </body>
</html>
