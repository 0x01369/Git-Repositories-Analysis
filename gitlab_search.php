<?php

$username = "yourusername";

$google_url = "https://www.google.com/search?q=" . urlencode("site:gitlab.com " . $username);
$google_result = file_get_contents($google_url);

preg_match_all("/<h3 class=\"r\"><a href=\"(.*?)\"/", $google_result, $matches);
$search_results = $matches[1];
$rank = 0;
foreach ($search_results as $result) {
    $rank++;
    if (strpos($result, "gitlab.com/$username") !== false) {
        break;
    }
}

if ($rank == 0) {
    echo "Your GitLab profile is not in the top 100 search results for the keyword '$username' on Google.";
} else {
    echo "Your GitLab profile is ranked #$rank for the keyword '$username' on Google.";
}

?>
