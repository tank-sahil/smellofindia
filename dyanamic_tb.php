<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Textbox Generation and Sorting</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numOfTextboxes = isset($_POST['num_of_textboxes']) ? $_POST['num_of_textboxes'] : 0;

    // Collect values from textboxes
    $values = array();
    for ($i = 1; $i <= $numOfTextboxes; $i++) {
        $textboxName = "textbox_" . $i;
        if (isset($_POST[$textboxName])) {
            $value = $_POST[$textboxName];
            if (!empty($value)) {
                $values[] = $value;
            }
        }
    }

    // Sort values in ascending order
    sort($values);

    // Display sorted values
    echo "<h2>Sorted Values:</h2>";
    echo "<ul>";
    foreach ($values as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
} else {
    // Display form to input number of textboxes
    echo "<h2>Enter the number of textboxes:</h2>";
    echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
    echo "<input type='number' name='num_of_textboxes' min='1' required>";
    echo "<input type='submit' value='Generate Textboxes'>";
    echo "</form>";
}

// Generate textboxes based on user input
if (isset($numOfTextboxes) && $numOfTextboxes > 0) {
    echo "<h2>Enter values in the textboxes:</h2>";
    echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
    for ($i = 1; $i <= $numOfTextboxes; $i++) {
        echo "<label>Textbox $i:</label>";
        echo "<input type='text' name='textbox_$i' required><br>";
    }
    echo "<input type='submit' value='Sort Values'>";
    echo "</form>";
}
?>

</body>
</html>
