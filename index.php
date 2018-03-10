<?php
$ch = curl_init();

$options = [
  CURLOPT_URL            => 'http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]=1',
  CURLOPT_RETURNTRANSFER => true
];

curl_setopt_array($ch, $options);
$result = curl_exec($ch);
curl_close($ch);

$quotes = json_decode($result);

if (!is_array($quotes) || !count($quotes)) {
  exit("An error occurred");
}

$quote = array_shift($quotes);

echo <<<EOF
<blockquote>
   $quote->content
   <p>-- <em>$quote->title</em></p>
</blockquote>
EOF;