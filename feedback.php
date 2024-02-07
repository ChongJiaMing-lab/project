<?php
include("database_connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  // Collect form data
  $name = $_POST["name"];
  $rating = $_POST["rate"];
  $comment = $_POST["comment"];

  // Insert data into the database
  $sql = "INSERT INTO feedback (user_name, rating, comment) VALUES ('$name', '$rating', '$comment')";

  if ($connect->query($sql) === TRUE) 
  {
    echo "<script>alert('Feedback submit successful');</script>";
} else 
{
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}


  // Close the database connection
  $connect->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html 
{
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("background.png");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}


    form {
            max-width: 400px;
            margin: 20px auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

.rate {
  float: left;
  height: 46px;
  padding: 0 125px;
  margin-bottom: 30px;
}
.rate:not(:checked) > input {
  position:absolute;
  top:-9999px;
}
.rate:not(:checked) > label {
  float:right;
  width:1em;
  overflow:hidden;
  white-space:nowrap;
  cursor:pointer;
  font-size:30px;
  color:#ccc;
}
.rate:not(:checked) > label:before {
  content: '★ ';
}
.rate > input:checked ~ label {
  color: #ffc700;
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
  color: #deb217;
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
  color: #c59b08;
}


</style>



</head>
<body>

<?php include 'user_header.php' ?>

    
<div class="bg-image"></div>

<div class="bg-text">
    <div id="login-title">
		<h4 style="color: #ddd;;font-family: Arial;margin-left: 20px;font-size: 30px;font-style: italic;font-weight: bolder;">User Feedback</h4>
	</div>
  <form id="commentForm" action="feedback.php" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <br>
        <label for="rating">Rating:</label>
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
          </div>
        </br>
        <br>
        <label for="comment">Your Comment:</label>
        <textarea id="comment" name="comment" rows="4" required></textarea>
    </br>
        <button type="submit" style="background-color: rgb(204, 198, 198); font-weight: bolder; color: black; width: 200px ;">Submit</button>
    </form>

       
</div>

</body>
</html>