<?php
function colors() {

  $data = [];
  $data['colors'] = Session::get('colors');
  $data['assets'] = array(
    "ASSET_IMGS" => asset('novo/imgs'),
  );
	return $data;
}


/*
function colors() {

  $colors = Session::get('colors');

  $assets = array(
    "ASSET_IMGS" => asset('novo/imgs'),
  );

  //dd($assets);

  $return = "";

  $arquivos = array(
    asset('novo/styles/main.css'),
    asset('novo/styles/content.css'),
    asset('novo/styles/edit.css'),
  );

  foreach ($arquivos as $value) {
    $filename = $value;
    $content =  file_get_contents($filename);

    //substitui cores
    foreach ($colors as $key => $cor) {
        $content = str_replace($key, $cor, $content);
    }

    //substitui url dos assets
    foreach ($assets as $key => $asset) {
      $content = str_replace($key, $asset, $content);
    }

    $return .= $content;
  }

	return $return;
}
*/
?>
