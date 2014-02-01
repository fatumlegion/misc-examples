<?php
require_once("UrlController.php");

$urls = array(
      'http://foo.com/pathA/?mc=1',
      'http://foo.com/pathA/?mc=2&foo=bar',
      'http://foo.com/pathB/?mc=3',
      'http://foo.com/pathA/?mc=2&foo=bar',
      'http://foo.com/pathB/?mc=3',
      'http://foo.com/pathA/?mc=2&foo=bar',
      'http://foo.com/pathB/?mc=3',
      'http://foo.com/pathA/?foo=bar&mc=123'
);

function parse_url_list($array, $insert = false)
{
      $r = array();
      $array_num = array_count_values($array);

      foreach ($array as $url)
      {
            $bits = preg_split("/(\?|\&)/i", $url);

            for ($i = 1; $i < count($bits); ++$i)
            {
                  $side = explode("=", $bits[$i]);

                  if ($side[0] == "mc")
                  {
                        $r[] = array(
                              $side[1] => array(
                                    $url => $array_num[$url]
                              )
                        );

                        if ($insert)
                        {
                              //This assumes a global instance of $pdo is available for use
                              $m = end($r);
                              $obj = UrlObj($side[1], var_export($m[$side[1]], true));
                              if (UrlController::add_url($pdo, $obj))
                              {
                                    //ok
                              }
                              else
                              {
                                    //failed, set errors before displaying html page
                              }
                        }
                  }
            }
      }

      return $r;
}
?>