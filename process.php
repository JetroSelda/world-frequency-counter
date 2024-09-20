<?php
function tokenizeText($text) {
    // Tokenize the text into words, removing punctuation and extra spaces
    return preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
}

function calculateFrequencies($words, $stopWords) {
    // Remove stop words
    $filteredWords = array_diff($words, $stopWords);
    // Calculate frequencies
    return array_count_values($filteredWords);
}

function sortFrequencies($frequencies, $order) {
    if ($order === 'asc') {
        asort($frequencies);
    } else {
        arsort($frequencies);
    }
    return $frequencies;
}

function displayResults($frequencies, $limit) {
    $output = "<h2>Word Frequencies:</h2><ul>";
    $count = 0;
    foreach ($frequencies as $word => $frequency) {
        if ($count >= $limit) {
            break;
        }
        $output .= "<li><strong>{$word}</strong>: {$frequency}</li>";
        $count++;
    }
    $output .= "</ul>";
    return $output;
}

// Main processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = trim($_POST['text']);
    $sortOrder = $_POST['sort_order'];
    $limit = intval($_POST['limit']);
    
    // Common stop words
    $stopWords = ["the", "and", "in", "of", "to", "a", "is", "that", "it", "on", "for", "with", "as", "was", "at", "by", "an"];
    
    // Error handling
    if (empty($text)) {
        echo "Error: No text provided.";
        exit;
    }
    
    // Tokenization
    $words = tokenizeText($text);
    
    // Calculate frequencies
    $frequencies = calculateFrequencies($words, $stopWords);
    
    // Sort frequencies
    $sortedFrequencies = sortFrequencies($frequencies, $sortOrder);
    
    // Display results
    echo displayResults($sortedFrequencies, $limit);
}
?>
