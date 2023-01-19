<?php

$username = 'yourusername';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://api.github.com/users/$username/repos");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
curl_close($curl);

$repos = json_decode($response, true);

$data = array();

foreach ($repos as $repo) {

    $name = $repo['name'];
    $forks = $repo['forks_count'];
    $stars = $repo['stargazers_count'];
    $language = $repo['language'];
    $created_at = $repo['created_at'];


    $data[] = array(
        'name' => $name,
        'forks' => $forks,
        'stars' => $stars,
        'language' => $language,
        'created_at' => $created_at,
    );
}


file_put_contents('output.html', $output);

echo $output;

?>
