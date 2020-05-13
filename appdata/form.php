<?php include('../inc/header.php'); 

$sql = "SELECT * FROM `access` WHERE store = '".$shop."' AND Status= '1'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$_SESSION["WebsiteURL"] = $row['WebsiteURL'];
$_SESSION["ConsumerKey"] = $row['ConsumerKey'];
$_SESSION["ConsumerSecret"] = $row['ConsumerSecret'];

if ($result->num_rows > 0) {

      header("Location: dashboard.php");

}
else {

?>

    <div class="shadow bg-white rounded p-4 w-75 m-auto">
        <form  method="post" id="key_form" action="account.php">
                 <div class="form-group">
                    <label>Website URL*</label>
                    <input type="url" required="required" name="url" class="form-control" id="url">
                 </div>
                 <div class="form-group">
                    <label>Consumer key*</label>
                    <input type="text" required="required" name="key" class="form-control" id="Consumer_key">
                 </div>
                 <div class="form-group">
                    <label>Consumer secret*</label>
                    <input type="text" required="required" name="secret" class="form-control" id="Consumer_secret ">
                 </div>
                 <button type="submit" class="btn spblue ml-0">Submit</button>
              </form>
              <div class="result"></div>

        <div class="result"></div>
    </div>


<?php 
}

include('../inc/footer.php'); ?>