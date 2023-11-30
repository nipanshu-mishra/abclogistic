<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "order_tracking";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the order number from the form
    $order_number = $_POST["order-number"];

    // Query the database for the order
    $sql = "SELECT * FROM orders WHERE order_number = '$order_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display order details
        $row = $result->fetch_assoc();
        $customer_name = $row["customer_name"];
        $shipping_address = $row["shipping_address"];
        $order_status = $row["order_status"];
        $estimated_delivery = $row["estimated_delivery"];

        echo "<h2>Order Details</h2>";
        echo "<p>Order Number: $order_number</p>";
        echo "<p>Customer Name: $customer_name</p>";
        echo "<p>Shipping Address: $shipping_address</p>";
        echo "<p>Order Status: $order_status</p>";
        echo "<p>Estimated Delivery Date: $estimated_delivery</p>";
    } else {
        echo "<p>Order not found.</p>";
    }

    // Close the database connection
    $conn->close();
}
?>

