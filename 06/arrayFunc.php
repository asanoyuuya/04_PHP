<?php

$domain = 'http://example.com?';
$text = 'PHP MySQL Laravel';

echo $domain .http_build_query([ '0'=> 'PHP', '1' => 'MySQL' , '2' => 'Laravel' ]);

/* http://example.com?0=PHP&1=MySQL&2=Laravel */;