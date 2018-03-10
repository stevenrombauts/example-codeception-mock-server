<?php
$config = require('config.php');

$ch = curl_init();

$options = [
  CURLOPT_URL            => $config['API_URL'] . '?filter[orderby]=rand&filter[posts_per_page]=1',
  CURLOPT_RETURNTRANSFER => true
];

curl_setopt_array($ch, $options);
$result = curl_exec($ch);
$code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($code == 200)
{
  $quotes = json_decode($result);
  $quote  = array_shift($quotes);

  $status = 200;
  $output = <<<EOF
  <h3>Quote of the day</h3>
  <blockquote>
     $quote->content
     <p>-- <em>$quote->title</em></p>
  </blockquote>
EOF;
}
else
{
  $output = sprintf("API returned status %d", $code);
  $status = 500;
}

http_response_code($status);
echo $output;
