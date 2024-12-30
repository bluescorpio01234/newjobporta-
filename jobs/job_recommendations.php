<?php
function calculateCosineSimilarity($job1, $job2) {
    $dotProduct = 0;
    $magnitudeJob1 = 0;
    $magnitudeJob2 = 0;

    // Calculate dot product and magnitudes
    foreach ($job1 as $user => $interaction) {
        if (isset($job2[$user])) {
            $dotProduct += $interaction * $job2[$user];  // Sum of pairwise multiplications
        }
    }

    // Calculate magnitudes
    foreach ($job1 as $interaction) {
        $magnitudeJob1 += $interaction * $interaction;
    }

    foreach ($job2 as $interaction) {
        $magnitudeJob2 += $interaction * $interaction;
    }

    $magnitudeJob1 = sqrt($magnitudeJob1);
    $magnitudeJob2 = sqrt($magnitudeJob2);

    if ($magnitudeJob1 * $magnitudeJob2 == 0) {
        return 0;  // Avoid division by zero
    }

    return $dotProduct / ($magnitudeJob1 * $magnitudeJob2);
}


?>
