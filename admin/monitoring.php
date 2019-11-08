<?php

require 'aws/vendor/autoload.php';

try {
	$client = new Aws\CloudWatch\CloudWatchClient([
		'region' => 'us-east-1',
      'version' => 'latest',
      'credentials' => [
              'key'    => 'AKIA6I4IJNBHAP6Y3U72',
              'secret' => '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',
        ]
	]);

	$ec2 = $client->getMetricWidgetImage([
		'MetricWidget' => '
			{
			    "view": "timeSeries",
			    "stacked": false,
			    "metrics": [
			        [ "AWS/EC2", "CPUCreditUsage", "InstanceId", "i-04636e19f1129aec5" ],
			        [ ".", "CPUCreditBalance", ".", "." ],
			        [ ".", "CPUSurplusCreditBalance", ".", "." ],
			        [ ".", "CPUSurplusCreditsCharged", ".", "." ],
			        [ ".", "NetworkPacketsIn", ".", "." ],
			        [ ".", "NetworkPacketsOut", ".", "." ],
			        [ ".", "CPUUtilization", ".", "." ],
			        [ ".", "NetworkIn", ".", "." ],
			        [ ".", "NetworkOut", ".", "." ],
			        [ ".", "DiskReadBytes", ".", "." ],
			        [ ".", "DiskWriteBytes", ".", "." ],
			        [ ".", "DiskReadOps", ".", "." ],
			        [ ".", "DiskWriteOps", ".", "." ],
			        [ ".", "StatusCheckFailed_System", ".", "." ],
			        [ ".", "StatusCheckFailed_Instance", ".", "." ],
			        [ ".", "StatusCheckFailed", ".", "." ]
			    ],
			    "width": 1282,
			    "height": 244,
			    "start": "-PT3H",
			    "end": "P0D"
			}
		'
	]);

	$arrEC2 = $ec2->toArray();
	$srcEC2 = base64_encode($arrEC2['MetricWidgetImage']);
	echo '<img src="data:image/png;base64,'.$srcEC2.'">';
}

catch (Aws\CloudWatch\Exception\CloudWatchException $e) {
	echo $e->getAwsErrorMessage();
}
catch (Exception $e) {
	echo $e->getMessage();
}

?>