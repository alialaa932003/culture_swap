<?php
// return [

//         '/'=>base_path("controller/index.php"),
//         '/about'=>base_path("controller/about.php"),
//         '/notes'=>base_path("controller/notes/index.php"),
//         '/note'=>base_path("controller/notes/show.php"),
//         '/notes/create'=>base_path("controller/notes/create.php"),
//         '/contact'=>base_path("controller/contact.php")
//     ];

    $router->get ('/culture_swap/','controller/index.php');
    $router->get ('/culture_swap/faq','controller/faq.php');
    $router->get ('/culture_swap/template','controller/template.php');



