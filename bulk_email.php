<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
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
