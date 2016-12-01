#! /usr/bin/env php
<?php
$a = json_decode(file_get_contents(__DIR__ . '/text.json'), TRUE);

readfile(__DIR__ . '/head.html');

echo '<table>', "\n";
foreach ($a as $group) {
	foreach ($group['text'] as $k => $t) {
		if ($k % 8 == 0) {
			echo '<tr class="text">';
		}
		echo '<td>';
		echo '<ruby>', $t, '<rt>', $group['pinyin'][$k], '</rt></ruby>';
		echo '</td>', "\n";
		if ($k % 8 == 7) {
			echo '</tr>', "\n";
		}
	}
	echo '</tr>', "\n";
	echo '<tr class="comment">', "\n";
	echo '<td colspan="8"><p>', $group['comment'], '</p></td>', "\n";
	echo '</tr>', "\n";

}
echo '</table>', "\n";

echo "\n", '</body></html>', "\n";
