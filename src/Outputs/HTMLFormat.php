<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        // Start the HTML structure with Pico CSS
        $output = <<<HTML
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of {$profile->getName()}</title>
    <link href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <article>
            <header style="text-align:center;">
                <h1>Profile of {$profile->getName()}</h1>
            </header>
            <figure style="display:flex;flex-direction:column;align-items:center;">
                <img src="https://www.auf.edu.ph/home/images/articles/bya.jpg" alt="Founder Image" class="rounded-circle" style="max-width: 200px;">
                <figcaption>Image of {$profile->getName()}</figcaption>
            </figure>
            <h2 style="text-align:center;">Story</h2>
            <section style="text-align:justify;">
                <p>{$profile->getStory()}</p>
            </section>
        </article>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</body>
</html>
HTML;

        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text/html');
        return $this->response;
    }
}
