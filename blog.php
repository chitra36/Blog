


<style>
        
        .posts{
            display: inline-block;
            
        }
       .blog_post {
        display: flex;
            flex-direction: column;
            width:auto;
            height:auto;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, content, banner FROM post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="posts">';
        echo '<div class="blog_post">';
        echo "<h2>" . $row["title"] . "</h2>";
        echo '<img src="' . $row["banner"] . '" alt="Banner Image" height="200" width="300"><br>';
        $content = $row["content"];
        
        if (strlen($content) > 50) {
            $content = substr($content, 0, 50) . '...'; 
            echo "<p>" . $content . "</p>";
            echo '<a href="#">Read More</a>'; 
        } else {
            echo "<p>" . $content . "</p>";
        }

        echo '</div>';
        echo '</div>';
    }
}
?>
