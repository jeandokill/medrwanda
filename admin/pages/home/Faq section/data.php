<?php
function getFaqEntriesFromDatabase()
{
    // Use your database connection to fetch FAQs from the 'faq_entries' table
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
    $conn = new mysqli('localhost', 'root', '', 'event');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM faq_entries";
    $result = $conn->query($sql);

    $faqEntries = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $faqEntries[] = [
                'id' => $row['id'],
                'question' => $row['question'],
                'answer' => $row['answer'],
            ];
        }
    }

    $conn->close();

    return $faqEntries;
}

function saveFaqEntriesToDatabase($faqEntries)
{
    // Use your database connection to save FAQs to the 'faq_entries' table
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
    $conn = new mysqli('localhost', 'root', '', 'event');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Remove existing entries and reinsert all FAQs
    $conn->query("TRUNCATE TABLE faq_entries");

    foreach ($faqEntries as $faq) {
        $question = $conn->real_escape_string($faq['question']);
        $answer = $conn->real_escape_string($faq['answer']);

        $sql = "INSERT INTO faq_entries (question, answer) VALUES ('$question', '$answer')";
        $conn->query($sql);
    }

    $conn->close();
}
?>
