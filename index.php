<?php

$api_key = "";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.whereby.dev/v1/meetings');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{
  "startDate": "2021-07-21T17:42:00.000Z",
  "endDate": "2021-07-22T17:41:00.000Z",
  "fields": ["hostRoomUrl"]}'
);

$headers = [
  'Authorization: Bearer ' . $api_key,
  'Content-Type: application/json'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

//echo "Status code: $httpcode\n";
$data = json_decode($response);
$url = $data->{'roomUrl'};
//echo "Room URL: ", $data->{'roomUrl'}, "\n";
//echo "Host room URL: ", $data->{'hostRoomUrl'}, "\n";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>TestDemo</title>
</head>
<body>
        
<div class="container-fluid mt-4 p-3">
        <iframe
        src="<?php echo $url; ?>"
        allow="camera; microphone; fullscreen; speaker; display-capture"
        width="100%" height="900"
        ></iframe>
</div>
        
     

        
</body>
</html>