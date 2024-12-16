<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Professional web development services">
  <title>Services / AV Labs - Professional Web Development</title>
  <link rel="shortcut icon" href="./assets/favicon.svg" type="image/x-icon" />
  <link href="./assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="./assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="./assets/fontawesome/css/solid.css" rel="stylesheet" />
  <link href="./src/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="./fonts/fonts.css" />
</head>

<body>
  <?php
  include './includes/components/header.php';

  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "avlabs_db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch data from the database
  $sql = "SELECT * FROM services";
  $result = $conn->query($sql);
  ?>

  <main>
    <section>
      <img src="./assets/undraw_services_re_hu5n.svg" alt="Illustration by unDraw" class="w-1/2" />
      <div class="copy-wrapper">
        <h1>
          Services you can trust. <i class="fa-solid fa-badge-check"></i>
        </h1>
        <p>Welcome to your new <span class="italic">all-star</span> web design and development team!</p>
        <p>
          The process isn't complicated. We listen to your goals, questions,
          and concerns. We create a plan for you and implement it precisely.
        </p>
        <p>
          Your project is built in a few phases which you approve each step of the way before you launch and go live
          to the world.
        </p>
        <p class="italic">*Ongoing maintenance and support is available.</p>
        <div class="btn-wrapper">
          <a href="#design" class="btn-primary">View Services</a>
          <a href="./pricing.php" class="btn-secondary">View
            Pricing</a>
        </div>
      </div>
    </section>

    <?php
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<section>";
        echo "<div class='copy-wrapper'>";
        echo "<h2>" . $row["title"] . " <i class='fa-solid fa-diamonds-4'></i></h2>";
        echo "<p>" . $row["description"] . "</p>";
        echo "</div>";
        echo "</section>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>

  </main>
  <?php include './includes/components/footer.php'; ?>
</body>

</html>