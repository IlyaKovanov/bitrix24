<?
require_once (__DIR__.'/crest.php');
/**
 * upload file bitrix24 disk
 */
$result = CRest::call(
		'disk.storage.uploadfile',
		array(
		'id'   => 1,
		'data' => array (
			'NAME' => 'log.txt',
		),
		'fileContent' => base64_encode(file_get_contents(__DIR__.'/log.txt')),
		)
	);

/**
 * move file into folder id=97
 */
$result1 = CRest::call(
		'disk.file.moveto',
		array(
			'id'   => $result['result']['ID'],
        	'targetFolderId' => 97
		)
	);	

echo '<pre>';
print_r($result);
echo '</pre>';
?>