<?php
function calculateTime($publishedAt)
{
    date_default_timezone_set('UTC');
    $now = time();

    // Calculate the difference in seconds
    $differenceInSeconds = $now - strtotime($publishedAt);

    // Convert seconds to a human-readable format
    if ($differenceInSeconds < 60) {
        $differenceFormatted = 'Just now';
    } elseif ($differenceInSeconds < 3600) {
        $differenceFormatted = round($differenceInSeconds / 60) . ' minutes ago';
    } elseif ($differenceInSeconds < 86400) {
        $differenceFormatted = round($differenceInSeconds / 3600) . ' hours ago';
    } else {
        $differenceFormatted = round($differenceInSeconds / 86400) . ' days ago';
    }

    return $differenceFormatted;
}
