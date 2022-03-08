<?php

/**
 * generate lorem ipsum (up to 5)
 * @param $i_paragraphs
 * @return string
 */
function lorem($i_paragraphs)
{
    $a[0] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam laoreet sapien id purus. Pellentesque suscipit imperdiet sapien.';
    $a[1] = 'Suspendisse potenti. In hac habitasse platea dictumst. Mauris ullamcorper semper ligula. Morbi purus. Praesent elementum egestas lacus.';
    $a[2] = 'Duis vestibulum iaculis turpis. Nunc blandit. Donec laoreet, risus in sodales accumsan, odio risus mollis eros, et dapibus ipsum arcu quis felis.';
    $a[3] = 'Nunc vestibulum purus sit amet lectus. Cras iaculis, metus non ullamcorper interdum, erat ante adipiscing lacus, consectetur posuere metus lectus sit amet neque.';
    $a[4] = 'Fusce varius, ligula a rutrum consectetur, nibh libero tempus elit, in dictum orci nulla id odio. Mauris leo mi, accumsan at, eleifend non, egestas quis, ante.';

    $html = '';
    for ($i = 1; $i <= count($a); $i++) {
        $html .= '<p>';
        $html .= $a[$i - 1];
        if ($i_paragraphs == $i) {
            break;
        }
        $html .= '</p>';
    }
    return $html;
}

?>